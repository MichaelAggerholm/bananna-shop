import './bootstrap';
import jQuery from 'jquery';
window.$ = jQuery;

$(document).ready(function () {
    var cvrContainer = $("#userRegistrationForm .cvrContainer");
    var cvrInput = $("#userRegistrationForm .cvrContainer input[name='cvr']");
    var cvrBtnActive = false;

    $(cvrContainer).css("display", "flex");
    $(cvrInput).attr('onkeyup', "if (/\\D/g.test(this.value)) this.value = this.value.replace(/\\D/g,\'\')");

    // Fancy append cvr button to cvrContainer if not already appended
    if (!cvrBtnActive) {
        cvrBtnActive = true;
        var btn = $('<input type="button" class="cvr-button btn" style="border: 1px solid darkgrey; border-radius: 5px;" value="Udfyld fra CVR"/>');
        $(cvrContainer).append(btn);
    }

    $(document).on("click", ".cvr-button", function () {
        var cvrNumber = $(cvrInput).val();

        $.getJSON('/?cvrLookup=' + cvrNumber).then(function (data) {
            console.log(data);

            // Contact data
            if (data.contact) {
                var cvrPhone = data.contact.filter(function (contact) {
                    return parseInt(contact) == contact; // Magic to find phone number in array
                });
                if (cvrPhone.length > 0) {
                    $("input[name='phone']").val(cvrPhone[0]);
                }

                var cvrEmail = data.contact.filter(function (contact) {
                    return contact.indexOf("@") > -1; // If contains @, it's the email
                });
                if (cvrEmail.length > 0) {
                    $("input[name='email']").val(cvrEmail[0]);
                }
            }

            // Address data
            if (data.address) {
                var cvrAddressLetter = '';
                if (data.address.bogstavFra && data.address.bogstavTil) {
                    cvrAddressLetter = data.address.bogstavFra + ' - ' + data.address.bogstavTil;
                } else if (data.address.bogstavFra && !data.address.bogstavTil) {
                    cvrAddressLetter = data.address.bogstavFra;
                }

                // building floor / apartment number
                var cvrFloorData = '';
                var cvrFloor = (data.address.etage) ? data.address.etage : '';
                var cvrApartmentNumber = (data.address.sidedoer) ? data.address.sidedoer : '';
                if (cvrFloor && cvrApartmentNumber) {
                    cvrFloorData = ' ' + cvrFloor + '. ' + cvrApartmentNumber;
                } else if (cvrFloor && !cvrApartmentNumber) {
                    cvrFloorData = ' ' + cvrFloor;
                } else if (!cvrFloor && cvrApartmentNumber) {
                    cvrFloorData = ' ' + cvrApartmentNumber;
                }

                var cvrAdressNumber = (data.address.husnummerTil) ? data.address.husnummerFra + ' - ' + data.address.husnummerTil : data.address.husnummerFra;
                var cvrCityName = (data.address.bynavn) ? data.address.bynavn : data.address.postdistrikt;

                if (data.address.vejnavn && data.address.husnummerFra)  {
                    $("input[name='address']").val(data.address.vejnavn + ' ' + cvrAdressNumber + cvrAddressLetter + cvrFloorData);
                }

                $("input[name='zip']").val(data.address.postnummer);
                $("input[name='city']").val(cvrCityName);
            }

            // Company data
            if (data.name) {
                $("input[name='company']").val(data.name.navn);
            }
        })
    });

}); //document ready
