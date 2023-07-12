$(document).ready(function() {

    $("#Inputfield_moduleSettings").on("focus", function () {
       $(this).select();
    });

    $("#Inputfield_allModuleSettings").on("focus", function () {
       $(this).select();
    });

    var allModuleSettings = typeof ProcessWire !== 'undefined' && ProcessWire.config ? ProcessWire.config.allModuleSettings : config.allModuleSettings;

    $("input[name='selectedModules[]']").on('change', function() {
        var settingsJson = {};
        $("input[name='selectedModules[]']").each(function() {
            if($(this).is(':checked') && $(this).val() !== 'toggleAll') {
                settingsJson[$(this).val()] = {};
                settingsJson[$(this).val()]['version'] = JSON.parse(allModuleSettings[$(this).val()])[$(this).val()]['version'];
                settingsJson[$(this).val()]['settings'] = JSON.parse(allModuleSettings[$(this).val()])[$(this).val()]['settings'];
            }
        });
        $('#Inputfield_allModuleSettings').val(JSON.stringify(settingsJson));
    });

    /* Selected Modules Toggle All */
    $("#wrap_Inputfield_selectedModules #Inputfield_selectedModules_toggleAll").click(function () {
        if ($("#wrap_Inputfield_selectedModules #Inputfield_selectedModules_toggleAll").is(':checked')) {
            $("#wrap_Inputfield_selectedModules input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });

        } else {
            $("#wrap_Inputfield_selectedModules input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });

    $("#wrap_Inputfield_selectedModules input[type=checkbox]:not('#Inputfield_selectedModules_toggleAll')").click(function () {
        $("#wrap_Inputfield_selectedModules #Inputfield_selectedModules_toggleAll").prop("checked", false);
    });

});

