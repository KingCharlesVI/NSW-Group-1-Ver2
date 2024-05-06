document.addEventListener("DOMContentLoaded", function() {
    const joinReasonField = document.getElementById("join_reason");
    const charCountSpan = document.getElementById("char-count");

    // Update character count
    joinReasonField.addEventListener("input", function() {
        const charCount = this.value.length;
        charCountSpan.textContent = charCount + "/80";

        // Check if character count meets the minimum requirement
        if (charCount < 80) {
            this.setCustomValidity("Minimum 80 characters required.");
        } else {
            this.setCustomValidity("");
        }
    });
});
