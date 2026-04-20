
  function validateProduct() {

    if (jQuery("#productStatus").val() === "") {
      alert("Product status is required field!");
      jQuery("#productStatus").focus();
      return false;
    }

    if (jQuery("#productName").val() === "") {
      alert("Product name is required field!");
      jQuery("#productName").focus();
      return false;
    }

    Query("#productQuantity").val(parseInt(jQuery("#productQuantity").val()));
    if (parseInt(jQuery("#productQuantity").val(), 10) == 0) {
      alert("Product quantity need to be bigger than zero!");
      jQuery("#productQuantity").focus();
      return false;
    }

    jQuery("#productPrice").val(parseFloat(jQuery("#productPrice").val()));
    if (parseFloat(jQuery("#productPrice").val()) == 0) {
      alert("Product price need to be decimal !");
      jQuery("#productPrice").focus();
      return false;
    }

    if (jQuery("#productDescription").val() === "") {
      alert("Product description is required field!");
      jQuery("#productDescription").focus();
      return false;
    }

    return true;
};

function onCreateNewProduct() {
    jQuery("#productId").val(0);
    jQuery("#productStatus").val("Enabled");
    jQuery("#productName").val("");
    jQuery("#productDescription").val("");
    jQuery("#productQuantity").val(0);
    jQuery("#productPrice").val(0.00);

    jQuery("#filter_by_status").val(jQuery("#filterProductStatus").val());
    jQuery("#filter_by_order").val(jQuery("#filterProductOrderBy").val());
    jQuery("#filter_by_category_id").val(jQuery("#filterCategoryId").val());
};

function onEditProduct(id) {
    onCreateNewProduct();
    jQuery.ajax({
        url: '/product/' + id,
        method: 'GET',
        contentType: 'application/json',
        dataType: 'json',
        success: function (json) {
            jQuery("#productId").val(json.id)
            jQuery("#productStatus").val(json.status)
            jQuery("#productName").val(json.name);
            jQuery("#productQuantity").val(json.quantity);
            jQuery("#productPrice").val(json.price);
            jQuery("#productDescription").val(json.description);
        },
        error: function (xhr, status, error) {
          alert(error);
        }
    });

 };

 function onSaveProduct() {
     if (validateProduct() === true) {
      const data = {
        id: jQuery('#productId').val(),
        status: jQuery('#productStatus').val(),
        name: jQuery('#productName').val(),
        description: jQuery('#productDescription').val(),
        quantity: jQuery('#productQuantity').val(),
        price: jQuery('#productPrice').val()
      };

      jQuery.ajax({
        url: '/product',
        method: 'PUT',
        contentType: 'application/json',
        data: JSON.stringify(data),
        dataType: 'json',
        contentType: 'application/json',
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        },
        success: function (json) {
                    alert("success: function" + json);
                    if (json.url) {
                        window.open(json.url, "_blank", "noopener,noreferrer");
                    };
                    /*
                    if (res.redirect) {
                      window.open(res.redirect, "_blank", "noopener,noreferrer");
                    };

                    if (res.thankyouurl) {
                      document.location.href = res.thankyouurl;
                    };
                    */
                  },
        error: function (xhr, status, error) {
          alert(error);
        }
        //success: res => console.log(res)
      });
    }
 }

jQuery(document).ready(function() {

    jQuery(document).on('click', '.edit_button', function() {
        const id = jQuery(this).attr('product_id');
        onEditProduct(id);
    });

     jQuery(document).on('click', '#btnProductSave', function() {
        if (validateProduct() === true) {
          jQuery("#productForm").submit();
          return true;
        }
        return false;
    });

    jQuery(document).on('click', '.more_description', function() {
        $id = jQuery(this).attr("id");
        jQuery(".short_description_" + $id).hide(500);
        jQuery(".full_description_" + $id).show(500);
    });

   jQuery(document).on('click', '.less_description', function() {
        $id = jQuery(this).attr("id");
        jQuery(".short_description_" + $id).show(500);
        jQuery(".full_description_" + $id).hide(500);
    });

    jQuery(document).on('change', '#filterProductStatus', function() {
        jQuery("#productsFilterForm").submit();
        return true;
    });

    jQuery(document).on('change', '#filterProductOrderBy', function() {
        jQuery("#productsFilterForm").submit();
        return true;
    });

    jQuery(document).on('change', '#filterCategoryId', function() {
        jQuery("#productsFilterForm").submit();
        return true;
    });


});
