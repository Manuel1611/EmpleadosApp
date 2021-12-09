$('#modalDelete').on('shown.bs.modal', function (event) {
    let deletePuesto = document.getElementById('deletePuesto');
    let element = event.relatedTarget;
    let action = element.getAttribute('data-url');
    let name = element.dataset.name;
    deletePuesto.innerHTML = name;
    let form = document.getElementById('modalDeletePuestoForm');
    form.action = action;
})