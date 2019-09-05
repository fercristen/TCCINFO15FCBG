function selectMenu(router) {
    $.ajax({
        type: 'GET',
        url: window.location.href,
        data: {'router':router},
        dataType: 'json',
        contentType: 'application/json',
        success: function(data) {
            $("#append").empty();
            $("#append").css('padding' , '30px');
            var buttonsTopo = criaAcoesTable(data.acoes, null, router);
            $("#append").append(buttonsTopo);
            $("#append").append('<br>');
            $("#append").append('<br>');
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
                var id = 0;
                    $.each(value, function( indexField, valueField ) {
                        if(indexField == 'id'){
                            id = valueField;
                        }
                        var td = document.createElement('td');
                        td.innerText = valueField;
                        trBody.appendChild(td);
                    });
                var tdActions = document.createElement('td');
                tdActions.innerHTML = criaAcoesTable(data.acoesLinha, id, router);
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
            alert("Não localizada consulta selecionada.");
        }
    });
}

function criaAcoesTable(acoes, id, routerConsulta) {
    var buttons = '';
    $.each(acoes, function( title, router ) {
       buttons += '&nbsp;<button idModel="'+id+'" onclick="selectForm(\''+router+'\', \''+routerConsulta+'\', this)">'+title+'</button> &nbsp;';
    });
    return buttons
}

function selectForm(router, routerConsulta, button) {
    $.ajax({
        type: 'GET',
        url: window.location.href,
        data: {'router':router, 'id': $(button).attr('idModel')},
        dataType: 'json',
        contentType: 'application/json',
        success: function (data) {
            if(data.html){
                $("#append").empty();
                $("#append").append(data.html);
            }else if(data.message){
                alert(data.message);
                selectMenu(routerConsulta);
            }
            if(data.dados){
                $.each(data.dados, function( index, value ) {
                    console.log(value, index);
                    $("[name="+index+"]").val(value);
                });
            }
            if(data.isView){
                $(".form-control").prop( "disabled", true );
            }
        },
        error: function (data) {
            console.log(data);
            alert('Erro ao encontrar tela solicitada');
        }
    });
}