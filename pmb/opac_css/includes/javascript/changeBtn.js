// todos los botones submit del opac 
document.querySelectorAll('span>input.bouton').forEach( e => { e.classList.remove('bouton') ;e.classList.add('btn');e.classList.add('btn-danger') });

document.querySelectorAll('span>input.boutonrechercher').forEach( e => { e.classList.remove('boutonrechercher') ;e.classList.add('btn');e.classList.add('btn-primary') });

document.querySelectorAll('div.avis_form_edit_buttons>input.bouton').forEach( e => { e.classList.remove('bouton') ;e.classList.add('btn');e.classList.add('btn-su') });


// ** formulario comentarios ** //
// eliminar caja de inputs html para comentarios

    // const linkCommit = document.querySelector('div#avis_65>h3>span>a')

    // linkCommit.addEventListener

    // linkCommit.addEventListener('click',eventsAddCommit)

    // function eventsAddCommit() {

    //     document.querySelectorAll('div.avis_form_edit_content')[0].remove()
    
    //     document.querySelectorAll('div.avis_form_edit_content')[1].remove()
    
    
        // document.querySelectorAll('div.avis_form_edit_content>input').forEach( e => {e.setAttribute('autocomplete','off');e.classList.add('form-control')})


        // // ocultar botones html del form
        // document.querySelectorAll('div.avis_form_edit>div>span.avis_html_editor').forEach(e => {e.classList.add('uk-hidden')})

        // // texarea
        // document.querySelectorAll('div.avis_form_edit_content>textarea').forEach( e => {e.classList.add('form-control')})
