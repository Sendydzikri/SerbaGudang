const sukses = $('.success').data('flashdata');
const error = $('.error').data('flashdata');


if(sukses){
	Swal.fire(

		'Berhasil !',
		'' + sukses,
		'success'

	);	
}

if(error){
	Swal.fire(

		'Gagal !',
		'' + error,
		'error'

	);
}
