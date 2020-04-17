window.addEventListener("load", function() {
    // Hide the Reset and Submit buttons as JS will handle auto submitting the form
    document.getElementById("filter-reset").style.display = "none";
    document.getElementById("filter-submit").style.display = "none";

    let filters = document.getElementById("filters");

    // Register to listen changes to language settings
    document.getElementById("language").addEventListener("change", function() {
        filters.submit();
    });

    // Register to listen to changes to department filter
    document.getElementById("department").addEventListener("change", function() {
        filters.submit();
    });
})