
$('form.jqValidation').each(function(index,element){
	$(this).validate();
});
$(document).ready(function(){

    $('#sidebarMenu').metisMenu();
    
    $(function(){
        $('[data-toggle="tooltip"]').tooltip({
            container:'body'
        });
    });
    var add_new_input = $('#add_new_input');
    add_new_input.on('change',function(){
        switch(add_new_input.val()){
            case 'text':
                createTextField();
                add_new_input.val("");
                break;
            case 'email':
                createEmailField();
                add_new_input.val("");
                break;
            case 'textarea':
                createTextAreaField();
                add_new_input.val("");
                break;
            case 'tel':
                createTelField();
                add_new_input.val("");
                break;
            case 'number':
                createNumberField();
                add_new_input.val("");
                break;
            case 'select':
                createSelectField();
                add_new_input.val("");
                break;
            case 'checkbox':
                createCheckBoxField();
                add_new_input.val("");
                break;
            case 'radio':
                createRadioField();
                add_new_input.val("");
                break;
            case 'date':
                createDateField();
                add_new_input.val("");
                break;
            case 'datetime-local':
                createDateTimeLocalField();
                add_new_input.val("");
                break;
            default:
                alert("Te rugăm să selectezi un tip de câmp");
                add_new_input.val("");
        }
    });
});
function sanitizeString(str){
    var sanitizedString = str.replace(/ /g,"-");
    sanitizedString = sanitizedString.toLowerCase();
}
function createTextField(){
    if (nrOfInputs === undefined){
        var nrOfInputs = 1;
    }else{
        nrOfInputs++;
    }
    var new_input_area = document.getElementById('new_input_area');
        var form_group = document.createElement("div");
            form_group.className="form-group col-sm-push-2 col-sm-12 form-group-styling";
            form_group.id="form_group_"+nrOfInputs;
            var col = document.createElement("div");
                col.className="col-sm-2 paddingtb15";
                var new_text_input = document.createElement("input");
                    new_text_input.type="text";
                    new_text_input.disabled = true;
                    new_text_input.value="text";
                    new_text_input.className = "form-control input_text";
                col.appendChild(new_text_input);
            form_group.appendChild(col);
            var col2 = document.createElement("div");
                col2.className="col-sm-2 paddingtb15";
                var new_text_input2 = document.createElement("input");
                    new_text_input2.type="text";
                    new_text_input2.placeholder="Nume câmp";
                    new_text_input2.name="input_name[]";
                    new_text_input2.className = "form-control input_text";
                    new_text_input2.id="input_name_"+nrOfInputs;
                col2.appendChild(new_text_input2);
            form_group.appendChild(col2);
            var col4 = document.createElement("div");
                col4.className="col-sm-2 paddingtb15";
                var new_text_input3 = document.createElement("input");
                    new_text_input3.type="checkbox";
                    new_text_input3.name="input_required[]";
                    new_text_input3.id="input_required_"+nrOfInputs;
                    new_text_input3.className = "form-control";
                col4.appendChild(new_text_input3);
                var new_text_input4 = document.createElement("label");
                    new_text_input4.htmlFor="input_required_"+nrOfInputs;
                    new_text_input4.innerHTML="Obligatoriu?";
                col4.appendChild(new_text_input4);
            form_group.appendChild(col4);
            var col3 = document.createElement("div");
                col3.className="col-sm-2 paddingtb15";
                var save_button = document.createElement("button");
                    save_button.className = "btn btn-success";
                    save_button.type = "submit";
                    save_button.innerHTML = "Adaugă";
                    save_button.onclick = function(e){
                        e.preventDefault();
                        form_id_get;
                        debugger;
                        var test = new_text_input3.checked;
                        $.post("/php/ajaxcalls/addInputToForm.php",
                            {
                                form_id_get: form_id_get,
                                input_name: new_text_input2.value,
                                input_type: "text",
                                input_required: new_text_input3.checked
                            },
                            function(data, status){
                                console.log("Data: " + data + "\nStatus: " + status);
                                if(data == 'success'){
                                    alert("Câmpul "+new_text_input2.value+" a fost adăugat cu success!");
                                }else{
                                    alert("ceva nu merge text");
                                }
                            }
                        );
                    };
                col3.appendChild(save_button);
            form_group.appendChild(col3);
            var col5 = document.createElement("div");
                col5.className="col-sm-2 paddingtb15";
                var delete_button = document.createElement("button");
                    delete_button.className = "btn btn-danger";
                    delete_button.innerHTML = "Șterge";
                    delete_button.onclick = function(e){
                        e.preventDefault();
                        form_group.remove();
                    };
                col5.appendChild(delete_button);
            form_group.appendChild(col5);
        new_input_area.appendChild(form_group);
}
function createNumberField(){
    if (nrOfInputs === undefined){
        var nrOfInputs = 1;
    }else{
        nrOfInputs++;
    }
    var new_input_area = document.getElementById('new_input_area');
        var form_group = document.createElement("div");
            form_group.className="form-group col-sm-push-2 col-sm-12 form-group-styling";
            form_group.id="form_group_"+nrOfInputs;
            var col = document.createElement("div");
                col.className="col-sm-2 paddingtb15";
                var new_text_input = document.createElement("input");
                    new_text_input.type="text";
                    new_text_input.disabled = true;
                    new_text_input.value="number";
                    new_text_input.className = "form-control input_text";
                col.appendChild(new_text_input);
            form_group.appendChild(col);
            var col2 = document.createElement("div");
                col2.className="col-sm-2 paddingtb15";
                var new_text_input2 = document.createElement("input");
                    new_text_input2.type="text";
                    new_text_input2.placeholder="Nume câmp";
                    new_text_input2.name="input_name[]";
                    new_text_input2.className = "form-control input_text";
                    new_text_input2.id="input_name_"+nrOfInputs;
                col2.appendChild(new_text_input2);
            form_group.appendChild(col2);
            var col4 = document.createElement("div");
                col4.className="col-sm-2 paddingtb15";
                var new_text_input3 = document.createElement("input");
                    new_text_input3.type="checkbox";
                    new_text_input3.name="input_required[]";
                    new_text_input3.id="input_required_"+nrOfInputs;
                    new_text_input3.className = "form-control";
                col4.appendChild(new_text_input3);
                var new_text_input4 = document.createElement("label");
                    new_text_input4.htmlFor="input_required_"+nrOfInputs;
                    new_text_input4.innerHTML="Obligatoriu?";
                col4.appendChild(new_text_input4);
            form_group.appendChild(col4);
            var col3 = document.createElement("div");
                col3.className="col-sm-2 paddingtb15";
                var save_button = document.createElement("button");
                    save_button.className = "btn btn-success";
                    save_button.type = "submit";
                    save_button.innerHTML = "Adaugă";
                    save_button.onclick = function(e){
                        e.preventDefault();
                        form_id_get;
                        debugger;
                        var test = new_text_input3.checked;
                        $.post("/php/ajaxcalls/addInputToForm.php",
                            {
                                form_id_get: form_id_get,
                                input_name: new_text_input2.value,
                                input_type: "number",
                                input_required: new_text_input3.checked
                            },
                            function(data, status){
                                console.log("Data: " + data + "\nStatus: " + status);
                                if(data == 'success'){
                                    alert("Câmpul "+new_text_input2.value+" a fost adăugat cu success!");
                                }else{
                                    alert("ceva nu merge text");
                                }
                            }
                        );
                    };
                col3.appendChild(save_button);
            form_group.appendChild(col3);
            var col5 = document.createElement("div");
                col5.className="col-sm-2 paddingtb15";
                var delete_button = document.createElement("button");
                    delete_button.className = "btn btn-danger";
                    delete_button.innerHTML = "Șterge";
                    delete_button.onclick = function(e){
                        e.preventDefault();
                        form_group.remove();
                    };
                col5.appendChild(delete_button);
            form_group.appendChild(col5);
        new_input_area.appendChild(form_group);
}
function createEmailField(){
    var new_input_area = document.getElementById('new_input_area');
        var form_group = document.createElement("div");
            form_group.className="form-group col-sm-push-2 col-sm-12 form-group-styling";
            form_group.id="form_group_"+nrOfInputs;
            var col = document.createElement("div");
                col.className="col-sm-2 paddingtb15";
                var new_text_input = document.createElement("input");
                    new_text_input.type="text";
                    new_text_input.disabled = true;
                    new_text_input.value="email";
                    new_text_input.className = "form-control input_text";
                col.appendChild(new_text_input);
            form_group.appendChild(col);
            var col2 = document.createElement("div");
                col2.className="col-sm-2 paddingtb15";
                var new_text_input2 = document.createElement("input");
                    new_text_input2.type="text";
                    new_text_input2.placeholder="Nume câmp";
                    new_text_input2.name="input_name[]";
                    new_text_input2.className = "form-control input_text";
                    new_text_input2.id="input_name_"+nrOfInputs;
                col2.appendChild(new_text_input2);
            form_group.appendChild(col2);
            var col4 = document.createElement("div");
                col4.className="col-sm-2 paddingtb15";
                var new_text_input3 = document.createElement("input");
                    new_text_input3.type="checkbox";
                    new_text_input3.name="input_required[]";
                    new_text_input3.id="input_required_"+nrOfInputs;
                    new_text_input3.className = "form-control";
                col4.appendChild(new_text_input3);
                var new_text_input4 = document.createElement("label");
                    new_text_input4.htmlFor="input_required_"+nrOfInputs;
                    new_text_input4.innerHTML="Obligatoriu?";
                col4.appendChild(new_text_input4);
            form_group.appendChild(col4);
            var col3 = document.createElement("div");
                col3.className="col-sm-2 paddingtb15";
                var save_button = document.createElement("button");
                    save_button.className = "btn btn-success";
                    save_button.type = "submit";
                    save_button.innerHTML = "Adaugă";
                    save_button.onclick = function(e){
                        e.preventDefault();
                        form_id_get;
                        debugger;
                        var test = new_text_input3.checked;
                        $.post("/php/ajaxcalls/addInputToForm.php",
                            {
                                form_id_get: form_id_get,
                                input_name: new_text_input2.value,
                                input_type: "email",
                                input_required: new_text_input3.checked
                            },
                            function(data, status){
                                //console.log("Data: " + data + "\nStatus: " + status);
                                if(data == 'success'){
                                    alert("Câmpul "+new_text_input2.value+" a fost adăugat cu success!");
                                }else{
                                    alert(data);
                                }
                            }
                        );
                    };
                col3.appendChild(save_button);
            form_group.appendChild(col3);
            var col5 = document.createElement("div");
                col5.className="col-sm-2 paddingtb15";
                var delete_button = document.createElement("button");
                    delete_button.className = "btn btn-danger";
                    delete_button.innerHTML = "Șterge";
                    delete_button.onclick = function(e){
                        e.preventDefault();
                        form_group.remove();
                    };
                col5.appendChild(delete_button);
            form_group.appendChild(col5);
        new_input_area.appendChild(form_group);
    nrOfInputs++;
}
function createTelField(){
    var new_input_area = document.getElementById('new_input_area');
        var form_group = document.createElement("div");
            form_group.className="form-group col-sm-push-2 col-sm-12 form-group-styling";
            form_group.id="form_group_"+nrOfInputs;
            var col = document.createElement("div");
                col.className="col-sm-2 paddingtb15";
                var new_text_input = document.createElement("input");
                    new_text_input.type="text";
                    new_text_input.disabled = true;
                    new_text_input.value="tel";
                    new_text_input.className = "form-control input_text";
                col.appendChild(new_text_input);
            form_group.appendChild(col);
            var col2 = document.createElement("div");
                col2.className="col-sm-2 paddingtb15";
                var new_text_input2 = document.createElement("input");
                    new_text_input2.type="text";
                    new_text_input2.placeholder="Nume câmp";
                    new_text_input2.name="input_name[]";
                    new_text_input2.className = "form-control input_text";
                    new_text_input2.id="input_name_"+nrOfInputs;
                col2.appendChild(new_text_input2);
            form_group.appendChild(col2);
            var col4 = document.createElement("div");
                col4.className="col-sm-2 paddingtb15";
                var new_text_input3 = document.createElement("input");
                    new_text_input3.type="checkbox";
                    new_text_input3.name="input_required[]";
                    new_text_input3.id="input_required_"+nrOfInputs;
                    new_text_input3.className = "form-control";
                col4.appendChild(new_text_input3);
                var new_text_input4 = document.createElement("label");
                    new_text_input4.htmlFor="input_required_"+nrOfInputs;
                    new_text_input4.innerHTML="Obligatoriu?";
                col4.appendChild(new_text_input4);
            form_group.appendChild(col4);
            var col3 = document.createElement("div");
                col3.className="col-sm-2 paddingtb15";
                var save_button = document.createElement("button");
                    save_button.className = "btn btn-success";
                    save_button.type = "submit";
                    save_button.innerHTML = "Adaugă";
                    save_button.onclick = function(e){
                        e.preventDefault();
                        form_id_get;
                        debugger;
                        var test = new_text_input3.checked;
                        $.post("/php/ajaxcalls/addInputToForm.php",
                            {
                                form_id_get: form_id_get,
                                input_name: new_text_input2.value,
                                input_type: "tel",
                                input_required: new_text_input3.checked
                            },
                            function(data, status){
                                console.log("Data: " + data + "\nStatus: " + status);
                                if(data == 'success'){
                                    alert("Câmpul "+new_text_input2.value+" a fost adăugat cu success!");
                                }else{
                                    alert("ceva nu merge text");
                                }
                            }
                        );
                    };
                col3.appendChild(save_button);
            form_group.appendChild(col3);
            var col5 = document.createElement("div");
                col5.className="col-sm-2 paddingtb15";
                var delete_button = document.createElement("button");
                    delete_button.className = "btn btn-danger";
                    delete_button.innerHTML = "Șterge";
                    delete_button.onclick = function(e){
                        e.preventDefault();
                        form_group.remove();
                    };
                col5.appendChild(delete_button);
            form_group.appendChild(col5);
        new_input_area.appendChild(form_group);
    nrOfInputs++;
}
function createDateField(){
    var new_input_area = document.getElementById('new_input_area');
        var form_group = document.createElement("div");
            form_group.className="form-group col-sm-push-2 col-sm-12 form-group-styling";
            form_group.id="form_group_"+nrOfInputs;
            var col = document.createElement("div");
                col.className="col-sm-2 paddingtb15";
                var new_text_input = document.createElement("input");
                    new_text_input.type="text";
                    new_text_input.disabled = true;
                    new_text_input.value="date";
                    new_text_input.className = "form-control input_text";
                col.appendChild(new_text_input);
            form_group.appendChild(col);
            var col2 = document.createElement("div");
                col2.className="col-sm-2 paddingtb15";
                var new_text_input2 = document.createElement("input");
                    new_text_input2.type="date";
                    new_text_input2.name="input_date[]";
                    new_text_input2.className = "form-control input_text";
                    new_text_input2.id="input_date_"+nrOfInputs;
                col2.appendChild(new_text_input2);
            form_group.appendChild(col2);
            var col4 = document.createElement("div");
                col4.className="col-sm-2 paddingtb15";
                var new_text_input3 = document.createElement("input");
                    new_text_input3.type="checkbox";
                    new_text_input3.name="input_required[]";
                    new_text_input3.id="input_required_"+nrOfInputs;
                    new_text_input3.className = "form-control";
                col4.appendChild(new_text_input3);
                var new_text_input4 = document.createElement("label");
                    new_text_input4.htmlFor="input_required_"+nrOfInputs;
                    new_text_input4.innerHTML="Obligatoriu?";
                col4.appendChild(new_text_input4);
            form_group.appendChild(col4);
            var col3 = document.createElement("div");
                col3.className="col-sm-2 paddingtb15";
                var save_button = document.createElement("button");
                    save_button.className = "btn btn-success";
                    save_button.type = "submit";
                    save_button.innerHTML = "Adaugă";
                    save_button.onclick = function(e){
                        e.preventDefault();
                        form_id_get;
                        debugger;
                        var test = new_text_input3.checked;
                        $.post("/php/ajaxcalls/addInputToForm.php",
                            {
                                form_id_get: form_id_get,
                                input_name: new_text_input2.value,
                                input_type: "date",
                                input_required: new_text_input3.checked
                            },
                            function(data, status){
                                console.log("Data: " + data + "\nStatus: " + status);
                                if(data == 'success'){
                                    alert("Câmpul "+new_text_input2.value+" a fost adăugat cu success!");
                                }else{
                                    alert("ceva nu merge text");
                                }
                            }
                        );
                    };
                col3.appendChild(save_button);
            form_group.appendChild(col3);
            var col5 = document.createElement("div");
                col5.className="col-sm-2 paddingtb15";
                var delete_button = document.createElement("button");
                    delete_button.className = "btn btn-danger";
                    delete_button.innerHTML = "Șterge";
                    delete_button.onclick = function(e){
                        e.preventDefault();
                        form_group.remove();
                    };
                col5.appendChild(delete_button);
            form_group.appendChild(col5);
        new_input_area.appendChild(form_group);
    nrOfInputs++;
}
function createDateTimeLocalField(){
    var new_input_area = document.getElementById('new_input_area');
        var form_group = document.createElement("div");
            form_group.className="form-group col-sm-push-2 col-sm-12 form-group-styling";
            form_group.id="form_group_"+nrOfInputs;
            var col = document.createElement("div");
                col.className="col-sm-2 paddingtb15";
                var new_text_input = document.createElement("input");
                    new_text_input.type="text";
                    new_text_input.disabled = true;
                    new_text_input.value="datetime-local";
                    new_text_input.className = "form-control input_text";
                col.appendChild(new_text_input);
            form_group.appendChild(col);
            var col2 = document.createElement("div");
                col2.className="col-sm-2 paddingtb15";
                var new_text_input2 = document.createElement("input");
                    new_text_input2.type="datetime-local";
                    new_text_input2.name="input_datetime-local[]";
                    new_text_input2.className = "form-control input_text";
                    new_text_input2.id="input_datetime-local_"+nrOfInputs;
                col2.appendChild(new_text_input2);
            form_group.appendChild(col2);
            var col4 = document.createElement("div");
                col4.className="col-sm-2 paddingtb15";
                var new_text_input3 = document.createElement("input");
                    new_text_input3.type="checkbox";
                    new_text_input3.name="input_required[]";
                    new_text_input3.id="input_required_"+nrOfInputs;
                    new_text_input3.className = "form-control";
                col4.appendChild(new_text_input3);
                var new_text_input4 = document.createElement("label");
                    new_text_input4.htmlFor="input_required_"+nrOfInputs;
                    new_text_input4.innerHTML="Obligatoriu?";
                col4.appendChild(new_text_input4);
            form_group.appendChild(col4);
            var col3 = document.createElement("div");
                col3.className="col-sm-2 paddingtb15";
                var save_button = document.createElement("button");
                    save_button.className = "btn btn-success";
                    save_button.type = "submit";
                    save_button.innerHTML = "Adaugă";
                    save_button.onclick = function(e){
                        e.preventDefault();
                        form_id_get;
                        debugger;
                        var test = new_text_input3.checked;
                        $.post("/php/ajaxcalls/addInputToForm.php",
                            {
                                form_id_get: form_id_get,
                                input_name: new_text_input2.value,
                                input_type: "datetime-local",
                                input_required: new_text_input3.checked
                            },
                            function(data, status){
                                console.log("Data: " + data + "\nStatus: " + status);
                                if(data == 'success'){
                                    alert("Câmpul "+new_text_input2.value+" a fost adăugat cu success!");
                                }else{
                                    alert("ceva nu merge text");
                                }
                            }
                        );
                    };
                col3.appendChild(save_button);
            form_group.appendChild(col3);
            var col5 = document.createElement("div");
                col5.className="col-sm-2 paddingtb15";
                var delete_button = document.createElement("button");
                    delete_button.className = "btn btn-danger";
                    delete_button.innerHTML = "Șterge";
                    delete_button.onclick = function(e){
                        e.preventDefault();
                        form_group.remove();
                    };
                col5.appendChild(delete_button);
            form_group.appendChild(col5);
        new_input_area.appendChild(form_group);
    nrOfInputs++;
}
function createCheckBoxField(){
    if (nrOfInputs === undefined){
        var nrOfInputs = 1;
    }else{
        nrOfInputs++;
    }
    debugger;
    var new_input_area = document.getElementById('new_input_area');
        var form_group = document.createElement("div");
            form_group.className="form-group col-sm-push-2 col-sm-12 form-group-styling";
            form_group.id="form_group_"+nrOfInputs;
            var col = document.createElement("div");
                col.className="col-sm-2 paddingtb15";
                var new_text_input = document.createElement("input");
                    new_text_input.type="text";
                    new_text_input.disabled = true;
                    new_text_input.value="checkbox";
                    new_text_input.className = "form-control input_text";
                col.appendChild(new_text_input);
            form_group.appendChild(col);
            var col9 = document.createElement("div");
                col9.className="col-sm-2 paddingtb15";
                var new_text_input2 = document.createElement("input");
                    new_text_input2.type="text";
                    new_text_input2.placeholder="Nume câmp";
                    new_text_input2.name="input_name";
                    new_text_input2.className = "form-control input_text";
                    new_text_input2.id="input_name_"+nrOfInputs;
                col9.appendChild(new_text_input2);
            form_group.appendChild(col9);
            debugger;
            var nr_of_values = 0;
            var col2 = document.createElement("div");
                col2.className="col-sm-2 paddingtb15";
                var new_value = document.createElement("input");
                    new_value.type="text";
                    new_value.placeholder = "Valoare";
                    new_value.name="input_values[]";
                    new_value.className = "form-control input_text";
                    new_value.id="input_values_" + nrOfInputs.toString() + "_" + nr_of_values.toString();
                col2.appendChild(new_value);
            form_group.appendChild(col2);
            var col6 = document.createElement("div");
                col6.className="col-sm-2 paddingtb15";
                var add_value = document.createElement("button");
                    add_value.type="text";
                    add_value.className = "btn btn-info";
                    add_value.id="add_value_" + nrOfInputs.toString();
                    add_value.innerHTML="+";
                    add_value.onclick = function(){
                        nr_of_values++;
                        var dinamic_value = document.createElement("input");
                            dinamic_value.type="text";
                            dinamic_value.name="input_values[]";
                            dinamic_value.placeholder = "Valoare";
                            dinamic_value.className = "form-control input_text";
                            dinamic_value.id="input_values_" + nrOfInputs.toString() + "_" + nr_of_values.toString();
                        col2.appendChild(dinamic_value);
                    };
                col6.appendChild(add_value);
            form_group.appendChild(col6);
            var col4 = document.createElement("div");
                col4.className="col-sm-2 paddingtb15";
                var new_text_input3 = document.createElement("input");
                    new_text_input3.type="checkbox";
                    new_text_input3.name="input_required[]";
                    new_text_input3.id="input_required_"+nrOfInputs.toString();
                    new_text_input3.className = "form-control";
                col4.appendChild(new_text_input3);
                var new_text_input4 = document.createElement("label");
                    new_text_input4.htmlFor="input_required_"+nrOfInputs.toString();
                    new_text_input4.innerHTML="Obligatoriu?";
                col4.appendChild(new_text_input4);
            form_group.appendChild(col4);
            var col3 = document.createElement("div");
                col3.className="col-sm-2 paddingtb15";
                var save_button = document.createElement("button");
                    save_button.className = "btn btn-success";
                    save_button.type = "submit";
                    save_button.innerHTML = "Adaugă";
                    save_button.onclick = function(e){
                        e.preventDefault();
                        debugger;
                        var values = [];
                        for(var i=0; i<=nr_of_values;i++){
                            var input_value = document.getElementById("input_values_"+nrOfInputs.toString()+"_"+i.toString());
                            if(input_value.value != ''){
                                values.push(input_value.value);
                            }

                        }
                        var post_values = values.join("~");
                        $.post("/php/ajaxcalls/addInputToForm.php",
                            {
                                form_id_get: form_id_get,
                                input_name: new_text_input2.value,
                                input_type: "checkbox",
                                input_values:post_values,
                                input_required: new_text_input3.checked
                            },
                            function(data, status){
                                console.log("Data: " + data + "\nStatus: " + status);
                                if(data == 'success'){
                                    alert("Câmpul "+new_text_input2.value+" a fost adăugat cu success!");
                                }else{
                                    alert(data);
                                }
                            }
                        );
                    };
                col3.appendChild(save_button);
            form_group.appendChild(col3);
            var col5 = document.createElement("div");
                col5.className="col-sm-2 paddingtb15";
                var delete_button = document.createElement("button");
                    delete_button.className = "btn btn-danger";
                    delete_button.innerHTML = "Șterge";
                    delete_button.onclick = function(e){
                        e.preventDefault();
                        form_group.remove();
                    };
                col5.appendChild(delete_button);
            form_group.appendChild(col5);
        new_input_area.appendChild(form_group);
}
function createRadioField(){
    if (nrOfInputs === undefined){
        var nrOfInputs = 1;
    }else{
        nrOfInputs++;
    }
    debugger;
    var new_input_area = document.getElementById('new_input_area');
        var form_group = document.createElement("div");
            form_group.className="form-group col-sm-push-2 col-sm-12 form-group-styling";
            form_group.id="form_group_"+nrOfInputs;
            var col = document.createElement("div");
                col.className="col-sm-2 paddingtb15";
                var new_text_input = document.createElement("input");
                    new_text_input.type="text";
                    new_text_input.disabled = true;
                    new_text_input.value="radio";
                    new_text_input.className = "form-control input_text";
                col.appendChild(new_text_input);
            form_group.appendChild(col);
            var col9 = document.createElement("div");
                col9.className="col-sm-2 paddingtb15";
                var new_text_input2 = document.createElement("input");
                    new_text_input2.type="text";
                    new_text_input2.placeholder="Nume câmp";
                    new_text_input2.name="input_name";
                    new_text_input2.className = "form-control input_text";
                    new_text_input2.id="input_name_"+nrOfInputs;
                col9.appendChild(new_text_input2);
            form_group.appendChild(col9);
            debugger;
            var nr_of_values = 0;
            var col2 = document.createElement("div");
                col2.className="col-sm-2 paddingtb15";
                var new_value = document.createElement("input");
                    new_value.type="text";
                    new_value.placeholder = "Valoare";
                    new_value.name="input_values[]";
                    new_value.className = "form-control input_text";
                    new_value.id="input_values_" + nrOfInputs.toString() + "_" + nr_of_values.toString();
                col2.appendChild(new_value);
            form_group.appendChild(col2);
            var col6 = document.createElement("div");
                col6.className="col-sm-2 paddingtb15";
                var add_value = document.createElement("button");
                    add_value.type="text";
                    add_value.className = "btn btn-info";
                    add_value.id="add_value_" + nrOfInputs.toString();
                    add_value.innerHTML="+";
                    add_value.onclick = function(){
                        nr_of_values++;
                        var dinamic_value = document.createElement("input");
                            dinamic_value.type="text";
                            dinamic_value.name="input_values[]";
                            dinamic_value.placeholder = "Valoare";
                            dinamic_value.className = "form-control input_text";
                            dinamic_value.id="input_values_" + nrOfInputs.toString() + "_" + nr_of_values.toString();
                        col2.appendChild(dinamic_value);
                    };
                col6.appendChild(add_value);
            form_group.appendChild(col6);
            var col4 = document.createElement("div");
                col4.className="col-sm-2 paddingtb15";
                var new_text_input3 = document.createElement("input");
                    new_text_input3.type="checkbox";
                    new_text_input3.name="input_required[]";
                    new_text_input3.id="input_required_"+nrOfInputs.toString();
                    new_text_input3.className = "form-control";
                col4.appendChild(new_text_input3);
                var new_text_input4 = document.createElement("label");
                    new_text_input4.htmlFor="input_required_"+nrOfInputs.toString();
                    new_text_input4.innerHTML="Obligatoriu?";
                col4.appendChild(new_text_input4);
            form_group.appendChild(col4);
            var col3 = document.createElement("div");
                col3.className="col-sm-2 paddingtb15";
                var save_button = document.createElement("button");
                    save_button.className = "btn btn-success";
                    save_button.type = "submit";
                    save_button.innerHTML = "Adaugă";
                    save_button.onclick = function(e){
                        e.preventDefault();
                        debugger;
                        var values = [];
                        for(var i=0; i<=nr_of_values;i++){
                            var input_value = document.getElementById("input_values_"+nrOfInputs.toString()+"_"+i.toString());
                            if(input_value.value != ''){
                                values.push(input_value.value);
                            }

                        }
                        var post_values = values.join("~");
                        $.post("/php/ajaxcalls/addInputToForm.php",
                            {
                                form_id_get: form_id_get,
                                input_name: new_text_input2.value,
                                input_type: "radio",
                                input_values:post_values,
                                input_required: new_text_input3.checked
                            },
                            function(data, status){
                                console.log("Data: " + data + "\nStatus: " + status);
                                if(data == 'success'){
                                    alert("Câmpul "+new_text_input2.value+" a fost adăugat cu success!");
                                }else{
                                    alert(data);
                                }
                            }
                        );
                    };
                col3.appendChild(save_button);
            form_group.appendChild(col3);
            var col5 = document.createElement("div");
                col5.className="col-sm-2 paddingtb15";
                var delete_button = document.createElement("button");
                    delete_button.className = "btn btn-danger";
                    delete_button.innerHTML = "Șterge";
                    delete_button.onclick = function(e){
                        e.preventDefault();
                        form_group.remove();
                    };
                col5.appendChild(delete_button);
            form_group.appendChild(col5);
        new_input_area.appendChild(form_group);
}
function createSelectField(){
    if (nrOfInputs === undefined){
        var nrOfInputs = 1;
    }else{
        nrOfInputs++;
    }
    debugger;
    var new_input_area = document.getElementById('new_input_area');
        var form_group = document.createElement("div");
            form_group.className="form-group col-sm-push-2 col-sm-12 form-group-styling";
            form_group.id="form_group_"+nrOfInputs;
            var col = document.createElement("div");
                col.className="col-sm-2 paddingtb15";
                var new_text_input = document.createElement("input");
                    new_text_input.type="text";
                    new_text_input.disabled = true;
                    new_text_input.value="select";
                    new_text_input.className = "form-control input_text";
                col.appendChild(new_text_input);
            form_group.appendChild(col);
            var col9 = document.createElement("div");
                col9.className="col-sm-2 paddingtb15";
                var new_text_input2 = document.createElement("input");
                    new_text_input2.type="text";
                    new_text_input2.placeholder="Nume câmp";
                    new_text_input2.name="input_name";
                    new_text_input2.className = "form-control input_text";
                    new_text_input2.id="input_name_"+nrOfInputs;
                col9.appendChild(new_text_input2);
            form_group.appendChild(col9);
            debugger;
            var nr_of_values = 0;
            var col2 = document.createElement("div");
                col2.className="col-sm-2 paddingtb15";
                var new_value = document.createElement("input");
                    new_value.type="text";
                    new_value.placeholder = "Valoare";
                    new_value.name="input_values[]";
                    new_value.className = "form-control input_text";
                    new_value.id="input_values_" + nrOfInputs.toString() + "_" + nr_of_values.toString();
                col2.appendChild(new_value);
            form_group.appendChild(col2);
            var col6 = document.createElement("div");
                col6.className="col-sm-2 paddingtb15";
                var add_value = document.createElement("button");
                    add_value.type="text";
                    add_value.className = "btn btn-info";
                    add_value.id="add_value_" + nrOfInputs.toString();
                    add_value.innerHTML="+";
                    add_value.onclick = function(){
                        nr_of_values++;
                        var dinamic_value = document.createElement("input");
                            dinamic_value.type="text";
                            dinamic_value.name="input_values[]";
                            dinamic_value.placeholder = "Valoare";
                            dinamic_value.className = "form-control input_text";
                            dinamic_value.id="input_values_" + nrOfInputs.toString() + "_" + nr_of_values.toString();
                        col2.appendChild(dinamic_value);
                    };
                col6.appendChild(add_value);
            form_group.appendChild(col6);
            var col4 = document.createElement("div");
                col4.className="col-sm-2 paddingtb15";
                var new_text_input3 = document.createElement("input");
                    new_text_input3.type="checkbox";
                    new_text_input3.name="input_required[]";
                    new_text_input3.id="input_required_"+nrOfInputs.toString();
                    new_text_input3.className = "form-control";
                col4.appendChild(new_text_input3);
                var new_text_input4 = document.createElement("label");
                    new_text_input4.htmlFor="input_required_"+nrOfInputs.toString();
                    new_text_input4.innerHTML="Obligatoriu?";
                col4.appendChild(new_text_input4);
            form_group.appendChild(col4);
            var col3 = document.createElement("div");
                col3.className="col-sm-2 paddingtb15";
                var save_button = document.createElement("button");
                    save_button.className = "btn btn-success";
                    save_button.type = "submit";
                    save_button.innerHTML = "Adaugă";
                    save_button.onclick = function(e){
                        e.preventDefault();
                        form_id_get;
                        debugger;
                        var test = new_text_input3.checked;
                        
                        var values = [];
                        for(var i=0; i<=nr_of_values;i++){
                            var input_value = document.getElementById("input_values_"+nrOfInputs.toString()+"_"+i.toString());
                            if(input_value.value != ''){
                                values.push(input_value.value);
                            }

                        }
                        var post_values = values.join("~");
                        $.post("/php/ajaxcalls/addInputToForm.php",
                            {
                                form_id_get: form_id_get,
                                input_name: new_text_input2.value,
                                input_type: "select",
                                input_values:post_values,
                                input_required: new_text_input3.checked
                            },
                            function(data, status){
                                console.log("Data: " + data + "\nStatus: " + status);
                                if(data == 'success'){
                                    alert("Câmpul "+new_text_input2.value+" a fost adăugat cu success!");
                                }else{
                                    alert(data);
                                }
                            }
                        );
                    };
                col3.appendChild(save_button);
            form_group.appendChild(col3);
            var col5 = document.createElement("div");
                col5.className="col-sm-2 paddingtb15";
                var delete_button = document.createElement("button");
                    delete_button.className = "btn btn-danger";
                    delete_button.innerHTML = "Șterge";
                    delete_button.onclick = function(e){
                        e.preventDefault();
                        form_group.remove();
                    };
                col5.appendChild(delete_button);
            form_group.appendChild(col5);
        new_input_area.appendChild(form_group);
}
function createTextAreaField(){
    if (nrOfInputs === undefined){
        var nrOfInputs = 1;
    }else{
        nrOfInputs++;
    }
    var new_input_area = document.getElementById('new_input_area');
        var form_group = document.createElement("div");
            form_group.className="form-group col-sm-push-2 col-sm-12 form-group-styling";
            form_group.id="form_group_"+nrOfInputs;
            var col = document.createElement("div");
                col.className="col-sm-2 paddingtb15";
                var new_text_input = document.createElement("input");
                    new_text_input.type="text";
                    new_text_input.disabled = true;
                    new_text_input.value="textarea";
                    new_text_input.className = "form-control input_text";
                col.appendChild(new_text_input);
            form_group.appendChild(col);
            var col2 = document.createElement("div");
                col2.className="col-sm-2 paddingtb15";
                var new_text_input2 = document.createElement("input");
                    new_text_input2.type="text";
                    new_text_input2.placeholder="Nume câmp";
                    new_text_input2.name="input_name[]";
                    new_text_input2.className = "form-control input_text";
                    new_text_input2.id="input_name_"+nrOfInputs;
                col2.appendChild(new_text_input2);
            form_group.appendChild(col2);
            var col4 = document.createElement("div");
                col4.className="col-sm-2 paddingtb15";
                var new_text_input3 = document.createElement("input");
                    new_text_input3.name="input_required[]";
                    new_text_input3.id="input_required_"+nrOfInputs;
                    new_text_input3.type="checkbox";
                    new_text_input3.className = "form-control";
                col4.appendChild(new_text_input3);
                var new_text_input4 = document.createElement("label");
                    new_text_input4.htmlFor="input_required_"+nrOfInputs;
                    new_text_input4.innerHTML="Obligatoriu?";
                col4.appendChild(new_text_input4);
            form_group.appendChild(col4);
            var col3 = document.createElement("div");
                col3.className="col-sm-2 paddingtb15";
                var save_button = document.createElement("button");
                    save_button.className = "btn btn-success";
                    save_button.type = "submit";
                    save_button.innerHTML = "Adaugă";
                    save_button.onclick = function(e){
                        e.preventDefault();
                        form_id_get;
                        debugger;
                        var test = new_text_input3.checked;
                        $.post("/php/ajaxcalls/addInputToForm.php",
                            {
                                form_id_get: form_id_get,
                                input_name: new_text_input2.value,
                                input_type: "textarea",
                                input_required: new_text_input3.checked
                            },
                            function(data, status){
                                console.log("Data: " + data + "\nStatus: " + status);
                                if(data == 'success'){
                                    alert("Câmpul "+new_text_input2.value+" a fost adăugat cu success!");
                                }else{
                                    alert(data);    
                                }
                            }   
                        );
                    };
                col3.appendChild(save_button);
            form_group.appendChild(col3);
            var col5 = document.createElement("div");
                col5.className="col-sm-2 paddingtb15";
                var delete_button = document.createElement("button");
                    delete_button.className = "btn btn-danger";
                    delete_button.innerHTML = "Șterge";
                    delete_button.onclick = function(e){
                        e.preventDefault();
                        form_group.remove();
                    };
                col5.appendChild(delete_button);
            form_group.appendChild(col5);
        new_input_area.appendChild(form_group);
}
/*
var isAdvancedUpload = function () {
    var div = document.createElement('div');
    return (('draggable' in div) || ('ondragstart' in div && 'ondrop' in div)) && 'FormData' in window && 'FileReader' in window;
}();
var $form = $('.box');
if (isAdvancedUpload) {

    var droppedFiles = false;
    $form.addClass('has-advanced-upload');
    $form.on('drag dragstart dragend dragover dragenter dragleave drop', function(e) {
        e.preventDefault();
        e.stopPropagation();
    }).on('dragover dragenter', function() {
        $form.addClass('is-dragover');
    }).on('dragleave dragend drop', function() {
        $form.removeClass('is-dragover');
    }).on('drop', function(e) {
        droppedFiles = e.originalEvent.dataTransfer.files;

        var ajaxData = new FormData($form.get(0));

        if (droppedFiles) {
            $.each( droppedFiles, function(i, file) {
                ajaxData.append( $input.attr('name'), file );
            });
        }
        $.ajax({
            url: $form.attr('action'),
            type: $form.attr('method'),
            data: ajaxData,
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            complete: function() {
                $form.removeClass('is-uploading');
            },
            success: function(data) {
                $form.addClass( data.success == true ? 'is-success' : 'is-error' );
                if (!data.success){ 
                    $errorMsg.text(data.error);
                }
            },
            error: function() {
                // Log the error, show an alert, whatever works for you
            }
        });
    });
}
/*
$form.on('submit', function(e) {
    if ($form.hasClass('is-uploading')) return false;

    $form.addClass('is-uploading').removeClass('is-error');

    if (isAdvancedUpload) {
        // ajax for modern browsers
        e.preventDefault();

        var ajaxData = new FormData($form.get(0));

        if (droppedFiles) {
            $.each( droppedFiles, function(i, file) {
                ajaxData.append( $input.attr('name'), file );
            });
        }

        $.ajax({
            url: $form.attr('action'),
            type: $form.attr('method'),
            data: ajaxData,
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            complete: function() {
                $form.removeClass('is-uploading');
            },
            success: function(data) {
                $form.addClass( data.success == true ? 'is-success' : 'is-error' );
                if (!data.success){ 
                    $errorMsg.text(data.error);
                }
            },
            error: function() {
                // Log the error, show an alert, whatever works for you
            }
        });
    } else {
        // ajax for legacy browsers
        var iframeName  = 'uploadiframe' + new Date().getTime();
        $iframe   = $('<iframe name="' + iframeName + '" style="display: none;"></iframe>');

        $('body').append($iframe);
        $form.attr('target', iframeName);

        $iframe.one('load', function() {
            var data = JSON.parse($iframe.contents().find('body' ).text());
            $form.removeClass('is-uploading').addClass(data.success == true ? 'is-success' : 'is-error').removeAttr('target');
            if (!data.success){ 
                $errorMsg.text(data.error);
            }   
            $form.removeAttr('target');
            $iframe.remove();
          });
    }
});
*/