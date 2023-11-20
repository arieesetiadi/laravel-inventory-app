// Set default validator config
if ($.validator) {
    $.validator.setDefaults({
        errorPlacement: function (label, element) {
            label.addClass('text-danger mt-1');
            // label.insertAfter(element);
            element.parent().append(label);
        }
});

    // Additional rules
    $.validator.addMethod('maxfilesize', function (value, element, param) {
        const max = param * 1024;
        return this.optional(element) || (element.files[0] && element.files[0].size <= max);
    }, 'File size must be less than {0} kilobytes.');

    $.validator.addMethod("positifdigits", function(value, element) {
        // Use a regular expression to check if the value is a non-negative integer
        return /^\d+$/.test(value);
    }, "Masukan angka yang valid.");
}