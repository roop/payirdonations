// This code requires jQuery

$(document).ready(function() {
// In Donate.php
    $(".highlightable").bind('focusin', function() {
                addWordToClassName(this.parentNode.parentNode,"highlighted");
                });
    $(".highlightable").bind('blur', function() {
                removeWordFromClassName(this.parentNode.parentNode,"highlighted")
                });
    $("#bank_transfer_selector").bind('change', function() {
                $("#bank_transfer_stack").fadeIn('slow');
                $("#cheque_dd_stack").hide();
    });
    $("#cheque_dd_selector").bind('change', function() {
                $("#cheque_dd_stack").fadeIn('slow');
                $("#bank_transfer_stack").hide();
    });
// In BankTransfer.php
    $("#bank_transfer_instructions_bank_select").bind('change', function() {
                $('.bank_transfer_instructions').hide();
                $('#bank_transfer_instructions_bank' + $(this).val()).show();
    });
    $('.bank_transfer_instructions_link').popupWindow({ centerScreen: 1 });
});

function validateForm() {
    var fieldsToCheck = new Array(
                            "name", "email",
                            "address_1",
                            "address_2", "address_3",
                            "address_4", // address_5 doesnt have invalid values
                            // nationality doesnt have invalid values
                            "amount",
                            "bankname");
    var allGood = true;
    var firstErraneousField = "";
    for (var i = 0; i < fieldsToCheck.length; i++) {
        var id = fieldsToCheck[i];
        var elem = document.getElementById(id);
        if (elem && !isValueCorrectInInputBox(elem)) {
            if (firstErraneousField == "")
                firstErraneousField = elem;
            addWordToClassName(elem, "erraneous");
            allGood = false;
            $("#" + id).bind('blur', function() {
                if (isValueCorrectInInputBox(this)) {
                    removeWordFromClassName(this, "erraneous");
                } else {
                    addWordToClassName(this, "erraneous");
                }
            });
        } else {
            removeWordFromClassName(elem, "erraneous");
        }
    }
    if (firstErraneousField != "")
        firstErraneousField.focus();
    return allGood;
}

function isValueCorrectInInputBox(obj)
{
    var emailRegEx = new RegExp("^[a-zA-Z0-9-_\\.]+@[a-zA-Z0-9-_]+\\.[a-zA-Z0-9-_\\.]+$");
    var amountRegEx = new RegExp("^[0-9]+(\\.[0-9]+)?$");
    var name = obj.name;
    if (!name)
        return;
    if (name == "email") {
        return emailRegEx.test(obj.value);
    } else if (name == "amount") {
        // return amountRegEx.test(obj.value);
        return (obj.value != ""); // might contain currency name?
    } else {
        return (obj.value != "");
    }
}

function addWordToClassName(obj, word)
{
    var orig = obj.className;
    var origList = orig.split(" ");
    var alreadyThere = false;
    for (var i = 0; i < origList.length; i++) {
        if (origList[i] == word) {
            alreadyThere = true;
        }
    }
    if (!alreadyThere) {
        obj.className = obj.className + " " + word;
    }
}

function removeWordFromClassName(obj, word)
{
    var orig = obj.className;
    var origList = orig.split(" ");
    var finalList = new Array;
    for (var i = 0; i < origList.length; i++) {
        if (!(origList[i] == word)) {
            finalList.push(origList[i]);
        }
    }
    obj.className = finalList.join(" ");
}
