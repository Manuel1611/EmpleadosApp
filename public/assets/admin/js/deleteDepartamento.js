$('#modalDelete').on('shown.bs.modal', function (event) {
    let deleteDepartamento = document.getElementById('deleteDepartamento');
    let element = event.relatedTarget;
    let action = element.getAttribute('data-url');
    let name = element.dataset.name;
    deleteDepartamento.innerHTML = name;
    let form = document.getElementById('modalDeleteDepartamentoForm');
    form.action = action;
})