let files = [],
dragArea = document.querySelector('.drag-area-foto'),
input = document.querySelector('.drag-area-foto input'),
button = document.querySelector('.card-foto-post button'),
select = document.querySelector('.drag-area-foto .select-fotopost'),
container = document.querySelector('.container');

/** CLICK LISTENER */
select.addEventListener('click', () => input.click());

/* INPUT CHANGE EVENT */
input.addEventListener('change', () => {
	let file = input.files;
        
    // if user select no image
    if (file.length == 0) return;
         
	for(let i = 0; i < file.length; i++) {
        if (file[i].type.split("/")[0] != 'image') continue;
        if (!files.some(e => e.name == file[i].name)) files.push(file[i])
    }

	showImages();
});

/** SHOW IMAGES */
function showImages() {
	container.innerHTML = files.reduce((prev, curr, index) => {
		return `${prev}
		    <div class="image">
			    <span onclick="delImage(${index})">&times;</span>
			    <img src="${URL.createObjectURL(curr)}" />
			</div>`
	}, '');
}

/* DELETE IMAGE */
function delImage(index) {
   files.splice(index, 1);
   showImages();
}

/* DRAG & DROP */
dragArea.addEventListener('dragover', e => {
	e.preventDefault()
	dragArea.classList.add('dragover')
})

/* DRAG LEAVE */
dragArea.addEventListener('dragleave', e => {
	e.preventDefault()
	dragArea.classList.remove('dragover')
});

/* DROP EVENT */
dragArea.addEventListener('drop', e => {
	e.preventDefault()
    dragArea.classList.remove('dragover');

	let file = e.dataTransfer.files;
	for (let i = 0; i < file.length; i++) {
		/** Check selected file is image */
		if (file[i].type.split("/")[0] != 'image') continue;
		
		if (!files.some(e => e.name == file[i].name)) files.push(file[i])
	}
	showImages();
});


//jQuery time

var current_fs, next_fs, previous_fs; //Fieldsets

var left, opacity, scale; //Propiedades fieldsets que animaremos

var animating; //Flag pra previnir glitchs de multi-click

//JavaScript para garantir que somente números sejam aceitos no campo de entrada da idade.

document.getElementById("idade").onkeydown = function(e) {

    if(!((e.keyCode > 95 && e.keyCode < 106)
      || (e.keyCode > 47 && e.keyCode < 58) 
      || e.keyCode == 8)) {
      return false;
    }
}

//

$(".next").click(function(){
	if(animating) return false;
	animating = true;
	
	current_fs = $(this).parent();
	next_fs = $(this).parent().next();
	
//Ativa o proximo passo da barra deprogressao usando o index do next_fs

	$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
	
//Mostra o próximo fieldset

	next_fs.show(); 

//Esconde o atual fieldset com style

	current_fs.animate({opacity: 0}, {

			step: function(now, mx) {

//Conforme a opacidade de current_fs reduz para 0 - armazenado em "now"

//1. Reduz escala current_fs para 80%

			scale = 1 - (1 - now) * 0.2;

//2. Traz next_fs da direita (50%)

			left = (now * 50)+"%";

//3. Aumenta a opacidade de next_fs para 1 conforme ele se move

			opacity = 1 - now;

			current_fs.css({
        		'transform': 'scale('+scale+')',
        		'position': 'absolute'
      		});
				next_fs.css({'left': left, 'opacity': opacity});
			}, 
				duration: 800, 
				complete: function(){
				current_fs.hide();
				animating = false;
			}, 
//Isso vem do plug-in de easing personalizado

			easing: 'easeInOutBack'
		});
	});

$(".previous").click(function(){
	if(animating) return false;
	animating = true;
	
	current_fs = $(this).parent();
	previous_fs = $(this).parent().prev();
	
//Desativa o passo atual na barra de progresso

	$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
	
//Mostra o fieldset anterior

	previous_fs.show(); 

//Esconde o atual fieldset com style

	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {

//Conforme a opacidade de current_fs reduz para 0 - armazenado em "now"

//1. Escala Previous_fs de 80% a 100%

			scale = 0.8 + (1 - now) * 0.2;
			
//2. Leva current_fs para a direita (50%) - de 0%

			left = ((1-now) * 50)+"%";

//3. Aumentar a opacidade de previous_fs para 1 conforme ele se move

			opacity = 1 - now;
			current_fs.css({'left': left});
			previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});

		}, 
		duration: 800, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 

//Isso vem do plug-in do easing personalizado

		easing: 'easeInOutBack'
	});
});

x

