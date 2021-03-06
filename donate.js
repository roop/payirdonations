// This code requires jQuery

String.prototype.startsWith = function(str) { return (this.match("^"+str)==str); }
String.prototype.endsWith = function(str) { return (this.match(str+"$")==str); }

$(document).ready(function() {
    if (window.location.href.endsWith("Donate.php")) {
        // since we have js up and running, replace target links with radio buttons, select bank transfer by default
        $("#is_js_enabled").val("true");
        $("#donation-options").html(
         '<input type="radio" name="payment_mode" id="in_kind_selector" value="in_kind_mode">' +
         '   <label class="choice">As an in-kind donation</label><br>' +
         '<input type="radio" name="payment_mode" id="bank_transfer_selector" value="bank_transfer_mode">' +
         '   <label class="choice">By bank transfer</label><br>' +
         '<input type="radio" name="payment_mode" id="cheque_dd_selector" value="cheque_dd_mode">' +
         '   <label class="choice">By cheque or demand draft</label><br>'
        );
        $(".payment_mode_stack").hide();
        if (getCookie("payir_payment_mode_cookie") == "banktransfer") {
            $("#bank_transfer_stack").show();
            $("#bank_transfer_selector").attr('checked', true);
        } else if (getCookie("payir_payment_mode_cookie") == "chequedd") {
            $("#cheque_dd_stack").show();
            $("#cheque_dd_selector").attr('checked', true);
        } else {
            $("#in_kind_stack").show();
            $("#in_kind_selector").attr('checked', true);
        }
        // highlight parts that are being filled up
        $(".highlightable").bind('focus', function() {
                    $(this).parent().parent("li").addClass("highlighted");
                    });
        $(".highlightable").bind('blur', function() {
                    $(this).parent().parent("li").removeClass("highlighted");
                    });
        // show the bank transfer mode per radio selection
        $("#bank_transfer_selector").bind('change', function() {
                    $("#bank_transfer_stack").fadeIn('slow');
                    $("#cheque_dd_stack").hide();
                    $("#in_kind_stack").hide();
                    setCookie("payir_payment_mode_cookie", "banktransfer");
        });
        $("#cheque_dd_selector").bind('change', function() {
                    $("#cheque_dd_stack").fadeIn('slow');
                    $("#bank_transfer_stack").hide();
                    $("#in_kind_stack").hide();
                    setCookie("payir_payment_mode_cookie", "chequedd");
        });
        $("#in_kind_selector").bind('change', function() {
                    $("#in_kind_stack").fadeIn('slow');
                    $("#cheque_dd_stack").hide();
                    $("#bank_transfer_stack").hide();
                    setCookie("payir_payment_mode_cookie", "inkind");
        });
    }
    if (window.location.href.endsWith("BankTransferInfo.php")) {
        $("#bank_transfer_instructions_bank_select").bind('change', function() {
                    $('.bank_transfer_instructions').hide();
                    $('#bank_transfer_instructions_bank' + $(this).val()).show();
        });
        $('.bank_transfer_instructions_link').popupWindow({ centerScreen: 1 });
        autoSelectBankInstructions('bank_transfer_instructions_bank_select', $('#bank_transfer_info_bankname').val());
    }
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
            $("#" + id).addClass("erraneous");
            allGood = false;
            $("#" + id).bind('blur', function() {
                if (isValueCorrectInInputBox(this)) {
                    $(this).removeClass("erraneous");
                } else {
                    $(this).addClass("erraneous");
                }
            });
        } else {
            $("#" + id).removeClass("erraneous");
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

function autoSelectBankInstructions(selectName, word)
{
    var matchingIndex = matchingBankIndex(word);
    if (matchingIndex == -1) {
        matchingIndex = 2; // Other
    }
    $("#" + selectName).val(matchingIndex);
    $("#" + selectName).change();
}

function matchingBankIndex(name)
{
    var groups = {
                    '0' : ['citi',],
                    '1' : ['icici', 'industrial credit and investment corporation of india'], // :)
                 };
    var result = -1; // 'Other'
    jQuery.each(groups, function(k, v) {
        jQuery.each(v, function() {
            if (name.toLowerCase().indexOf(this) != -1) {
                result = k;
                return false;
            }
        });
        if (result != -1) {
            return false;
        }
    });
    return result;
}

function setCookie(key, value)
{
    var cookieValidTill = new Date();
    cookieValidTill.setDate(cookieValidTill.getDate() + 365 /* one year */);
    var cookieStr = key + "=" + value + "; expiry=" + cookieValidTill.toGMTString() + "; path=/";
    document.cookie = cookieStr;
}

function getCookie(key)
{
	var cookies = document.cookie.split(/; \*/);
	for(var i = 0; i < cookies.length; i++) {
		var cookie = cookies[i];
		if (cookie.indexOf(key) == 0)
            return cookie.substring(key.length + 1 /* count '=' sign as well */, cookie.length);
	}
	return null;
}
