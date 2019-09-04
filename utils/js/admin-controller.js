function selectMenu(router) {
    console.log(router);
    $.ajax({
        type: 'GET',
        url: window.location.href,
        data: {'router':router},
        dataType: 'json',
        contentType: 'application/json',
        success: function(data) {
            $("#append").empty();
            $("#append").css('padding' , '30px');
            var table = document.createElement('table');
            var thead = document.createElement('thead');
            var tr = document.createElement('tr');
            $.each(data.fields, function( index, value ) {
                var th = document.createElement('th');
                th.innerText = value;
                tr.append(th);
            });
            var thActions = document.createElement('th');
            thActions.innerText = 'Ações';
            tr.appendChild(thActions);
            thead.append(tr);
            table.append(thead);
            var tbody = document.createElement('tbody');
            $.each(data.dados, function( index, value ) {
                var trBody = document.createElement('tr');
                    $.each(value, function( indexField, valueField ) {
                        var td = document.createElement('td');
                        td.innerText = valueField;
                        trBody.appendChild(td);
                    });
                var tdActions = document.createElement('td');
                tdActions.innerHTML = criaAcoesTable(data.acoes);
                trBody.appendChild(tdActions);
                tbody.append(trBody);
            });
            table.appendChild(tbody);
            $("#append").append(table);
            $(table).DataTable({"oLanguage":{
                "sEmptyTable": "Nenhum registro encontrado",
                "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                "sInfoPostFix": "",
                "sInfoThousands": ".",
                "sLengthMenu": "_MENU_ resultados por página",
                "sLoadingRecords": "Carregando...",
                "sProcessing": "Processando...",
                "sZeroRecords": "Nenhum registro encontrado",
                "sSearch": "Pesquisar",
                "oPaginate": {
                    "sNext": "Próximo",
                    "sPrevious": "Anterior",
                    "sFirst": "Primeiro",
                    "sLast": "Último"
                },
                "oAria": {
                    "sSortAscending": ": Ordenar colunas de forma ascendente",
                    "sSortDescending": ": Ordenar colunas de forma descendente"
                }
            }});
        },
        error: function (data) {
            $("#append").empty();
            alert("Não localizada consulta selecionada.");
        }
    });
}

function criaAcoesTable(acoes) {
    var buttons = '';
    $.each(acoes, function( title, router ) {
       buttons += '&nbsp;<button onclick="selectForm(\''+router+'\')">'+title+'</button> &nbsp;';
    });
    return buttons
}

function selectForm(router) {
    alert(router);
}