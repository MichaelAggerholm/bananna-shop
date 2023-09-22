#!/bin/bash

sudo lsof -t -i tcp:80 -s tcp:listen | sudo xargs kill

./vendor/bin/sail up -d

sleep 5

npm run dev
