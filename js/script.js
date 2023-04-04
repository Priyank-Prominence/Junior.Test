$(document).ready(function() {
    $('#delete-product-btn').on('click', function() {
        const selectedProducts = [];
        $('.delete-checkbox:checked').each(function() {
            selectedProducts.push($(this).val());
        });

        if (selectedProducts.length > 0) {
            $.ajax({
                url: 'mass-delete.php',
                type: 'POST',
                data: {
                    mass_delete: true,
                    selected_products: selectedProducts
                },
                success: function(response) {
                    location.reload();
                }
            });
        }
    });

    $(".add-btn").on("click", function(event) {
        event.preventDefault();
        window.location.href = "add-product";
    });

    const specialAttributeDescription = $("#special-attribute-description");

    const specialAttributeMap = {
        'DVD': 'Size (MB)',
        'Book': 'Weight (KG)',
        'Furniture': 'Dimensions (HxWxL)',
    };

    function showNotification(message) {
        const notification = $("#notification");
        notification.text(message);
        notification.show();
        setTimeout(() => {
            notification.hide();
        }, 3000);
    }

    $("#productType").change(function() {
        const productType = $(this).val();

        for (var type in specialAttributeMap) {
            $("#" + type).hide();
            $("#" + type + " input").prop("required", false);
        }

        if (productType in specialAttributeMap) {
            $("#" + productType).show();
            $("#" + productType + " input").prop("required", true);
            specialAttributeDescription.html('Please provide ' + specialAttributeMap[productType]);
        } else {

            specialAttributeDescription.html('');
        }
    });

    $("#product_form").submit(function(event) {
        event.preventDefault();

        const formData = $(this).serializeArray().reduce((obj, item) => {
            obj[item.name] = item.value;
            return obj;
        }, {});

        $.ajax({
            url: "save-product.php",
            type: "POST",
            data: formData,
            dataType: "json",
            success: function(response) {
                if (response.success) {
                    window.location.href = "index.php"; // Redirect to the index page
                } else {
                    showNotification(response.message);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                showNotification("An error occurred. Please try again.");
            },
        });
    });




    $(".cancel-btn").on("click", function(event) {
        event.preventDefault();
        window.location.href = "index.php";
    });

});