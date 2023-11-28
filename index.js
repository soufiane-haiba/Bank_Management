function toggleInputs(rowId) {
    const updateInputs = document.getElementById(`updateInputs_${rowId}`);
    updateInputs.classList.toggle('hidden-inputs');
}