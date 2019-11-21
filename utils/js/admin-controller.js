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
                tdActions.className = 'actions';
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
                "sLengthMenu": "Resultados por página _MENU_",
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
            resizableGrid(table);
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

/**
 * Daqui para baixo.
 *
 * Encontrado em https://www.brainbell.com/javascript/making-resizable-table-js.html
 */
function resizableGrid(table) {
    var row = table.getElementsByTagName('tr')[0],
        cols = row ? row.children : undefined;
    if (!cols) return;

    table.style.overflow = 'hidden';

    var tableHeight = table.offsetHeight;

    for (var i=0;i<cols.length;i++){
        var div = createDiv(tableHeight);
        cols[i].appendChild(div);
        cols[i].style.position = 'relative';
        setListeners(div);
    }

    function setListeners(div){
        var pageX,curCol,nxtCol,curColWidth,nxtColWidth;

        div.addEventListener('mousedown', function (e) {
            curCol = e.target.parentElement;
            nxtCol = curCol.nextElementSibling;
            pageX = e.pageX;

            var padding = paddingDiff(curCol);

            curColWidth = curCol.offsetWidth - padding;
            if (nxtCol)
                nxtColWidth = nxtCol.offsetWidth - padding;
        });

        div.addEventListener('mouseover', function (e) {
            e.target.style.borderRight = '2px solid #0000ff';
        })

        div.addEventListener('mouseout', function (e) {
            e.target.style.borderRight = '';
        })

        document.addEventListener('mousemove', function (e) {
            if (curCol) {
                var diffX = e.pageX - pageX;

                if (nxtCol)
                    nxtCol.style.width = (nxtColWidth - (diffX))+'px';

                curCol.style.width = (curColWidth + diffX)+'px';
            }
        });

        document.addEventListener('mouseup', function (e) {
            curCol = undefined;
            nxtCol = undefined;
            pageX = undefined;
            nxtColWidth = undefined;
            curColWidth = undefined
        });
    }

    function createDiv(height){
        var div = document.createElement('div');
        div.style.top = 0;
        div.style.right = 0;
        div.style.width = '5px';
        div.style.position = 'absolute';
        div.style.cursor = 'col-resize';
        div.style.userSelect = 'none';
        div.style.height = height + 'px';
        return div;
    }

    function paddingDiff(col){

        if (getStyleVal(col,'box-sizing') == 'border-box'){
            return 0;
        }

        var padLeft = getStyleVal(col,'padding-left');
        var padRight = getStyleVal(col,'padding-right');
        return (parseInt(padLeft) + parseInt(padRight));

    }

    function getStyleVal(elm,css){
        return (window.getComputedStyle(elm, null).getPropertyValue(css))
    }
};