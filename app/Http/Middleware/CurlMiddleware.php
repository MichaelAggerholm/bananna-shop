<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CurlMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // CVR API dokumentation: https://docs.cvr.dev/
        if (isset($_GET['cvrLookup'])) {

            // Initialize cURL session
            $ch = curl_init();

            // Set cURL options
            curl_setopt($ch, CURLOPT_URL, 'http://distribution.virk.dk/cvr-permanent/virksomhed/_search');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Content-Type: application/json',
                'Authorization: Basic ' . base64_encode(env('CVR_API_KEY')) // TODO, husk at tilføje API key til .env filen
            ]);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
                "query" => [
                    "match" => [
                        "Vrvirksomhed.cvrNummer" => [
                            "query" => $_GET['cvrLookup']
                        ]
                    ]
                ],
                "size" => 1
            ]));

            // Execute cURL session and store the result in $response
            $response = curl_exec($ch);

            // Close cURL session
            curl_close($ch);

            // Process the response
            $responseArray = json_decode($response, true);
            $virksomhedMetadata = $responseArray["hits"]["hits"][0]["_source"]["Vrvirksomhed"]["virksomhedMetadata"];

            // Set content type header
            header("Content-Type: application/json");

            // Output the JSON data
            echo json_encode([
                "name" => $virksomhedMetadata["nyesteNavn"],
                "address" => $virksomhedMetadata["nyesteBeliggenhedsadresse"],
                "contact" => $virksomhedMetadata["nyesteKontaktoplysninger"],
            ]);

            exit;
        }

        return $next($request);
    }
}
