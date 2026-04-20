
  function validateCategory() {

    if (jQuery("#categoryStatus").val() === "") {
      alert("Category status is required field!");
      jQuery("#categoryStatus").focus();
      return false;
    }

    if (jQuery("#categoryName").val() === "") {
      alert("Category name is required field!");
      jQuery("#categoryName").focus();
      return false;
    }

    if (jQuery("#categoryDescription").val() === "") {
      alert("Category description is required field!");
      jQuery("#categoryDescription").focus();
      return false;
    }

    return true;
};

function onCreateNewCategory() {
    jQuery("#categoryId").val(0)
    jQuery("#categoryStatus").val("Enabled")
    jQuery("#categoryName").val("");
    jQuery("#categoryDescription").val("");

    jQuery("#filter_by_status").val(jQuery("#filterCategoryStatus").val());
    jQuery("#filter_by_order").val(jQuery("#filterCategoryOrderBy").val());
    jQuery("#filter_by_category_id").val(jQuery("#filterCategoryId").val());
};

function onEditCategory(id) {
    onCreateNewCategory();
    jQuery.ajax({
        url: '/category/' + id,
        method: 'GET',
        contentType: 'application/json',
        dataType: 'json',
        success: function (json) {
            jQuery("#categoryId").val(json.id)
            jQuery("#categoryStatus").val(json.status)
            jQuery("#categoryName").val(json.name);
            jQuery("#categoryDescription").val(json.description);
        },
        error: function (xhr, status, error) {
          alert(error);
        }
    });

 };

 function onSaveCategory() {
     if (validateCategory() === true) {

      const data = {
        id: jQuery('#categoryId').val(),
        status: jQuery('#categoryStatus').val(),
        name: jQuery('#categoryName').val(),
        description: jQuery('#categoryDescription').val()
      };

      jQuery.ajax({
        url: '/category',
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
        const id = jQuery(this).attr('category_id');
        onEditCategory(id);
    });

     jQuery(document).on('click', '#btnCategorySave', function() {
        if (validatecategory() === true) {
          jQuery("#categoryForm").submit();
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

    jQuery(document).on('change', '#filterCategoryStatus', function() {
        jQuery("#categoriesFilterForm").submit();
        return true;
    });

    jQuery(document).on('change', '#filterCategoryOrderBy', function() {
        jQuery("#categoriesFilterForm").submit();
        return true;
    });

    jQuery(document).on('change', '#filterCategoryId', function() {
        jQuery("#categoriesFilterForm").submit();
        return true;
    });


});
