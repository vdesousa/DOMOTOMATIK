<?php
<script>
function validateForm() {
    var x = document.forms["myForm"]["nom"].value;
    if (x == "") {
        alert("Le nom est vide");
        return false;
    }
}
</script>
?>