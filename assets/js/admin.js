window.openModel = function(event,action){
    console.log("open object");
    console.log(event.target.dataset.id);
 const   id =event.target.dataset.id;
 document.getElementById('message-model')?.classList.remove('hidden');
//  console.log(document.getElementById('selected_id')?.value);
 document.getElementById('selected_id').value = id ;
 document.getElementById('_action').value = action ;
 document.getElementById('submit_message').innerHTML="are you sure you want to " + action +" this account ?" ;
 console.log(document.getElementById('submit_message'));
//  console.log(document.getElementById('selected_id')?.value); 

}
// openModelAddCar
window.openModelAddCar = function(event){
 document.getElementById('add-car-model')?.classList.remove('hidden');

}
// reservation_message-model
window.openModelReservation = function(event,action){
    console.log("open object");
    console.log(event.target.dataset.id);
 const   id =event.target.dataset.id;
 document.getElementById('reservation_message-model')?.classList.remove('hidden');
//  console.log(document.getElementById('selected_id')?.value);
 document.getElementById('selected_id2').value = id ;
 document.getElementById('_action2').value = action ;
 document.getElementById('submit_message2').innerHTML="are you sure you want to " + action +" this account ?" ;
 console.log(document.getElementById('submit_message'));
//  console.log(document.getElementById('selected_id')?.value); 

}
window.openModelEditCar = function(event){
    let id = event.target.dataset.carid;

    fetch(`/req.php?id=${id}`).then(response => response.json())
    .then(data => {

        console.log(data);
        const car =data;
        const form = document.getElementById('form-edit-car');
        // console.log(form['marque']);
        form['id'].value = car['id'];
        form['marque'].value = car['marque'];
        form['modele'].value = car['modele'];
        form['matricule'].value = car['matricule'];
        form['prix_par_jour'].value = car['prix_par_jour'];
        form['image_url'].value = car['image_url'];
        form['disponible'].value = car['disponible'];
        console.log(form);
        document.getElementById('edit-car-model')?.classList.remove('hidden');
    });

}
window.closeModel = function(event){
// console.log("message-model");
// console.log(event.target.closest('section'));
// document.getElementById('message-model').classList.add('hidden');
event.target.closest('section').classList.add('hidden');


}


// console.log("object");