function toggleMenu(side){

	var sidebar = $(".sidebar"); 

	var aside_user = $("#aside_user");

	var btn_menu = $(".btn_menu");

	var iconMenu = 	btn_menu.filter("[data-side=left]");

	var iconUser = btn_menu.filter("[data-side=right]");

	$("#sidebar_menu").css("--fix-sidebar-menu", "auto");	/* Verificação para saber qual do btn_menu foi clicado */

	if(side == "left"){
/* Se não tiver a classe de esconder o menu */

		if(!sidebar.hasClass("hideMenu")){

			/* -Adiciona- a classe hideMenu */

			sidebar.addClass("hideMenu");

			

			if($("#aside_user").hasClass("hideAside")) $(".dark_panel").hide(); // Esconde o painel 

			if($(window).width() > 990) $("#main_content").css("--max-width-content", "100%");

			$("#main_content").removeClass("openedMenu");

		}

		else{ // O menu está aparecendo é para esconder 

			if($(window).width() < 990){

				aside_user.addClass("hideAside"); // Esconde o sidebar - user quando clicar para abrir o sidebar-menu 

				$(".dark_panel").fadeIn();  // Esconde o painel escuro 

				/*$("#main_content").css("--max-width-content", "initial");*/

				$("#main_content").addClass("openedMenu");
				

			}	

			sidebar.removeClass("hideMenu"); // Esconde o menu

			

			$("#main_content").css("--max-width-content", "initial");
		}
	}else{ 
		/* Verifica se o aside esta escondido */

		if(aside_user.hasClass("hideAside")) {

			

			if($(window).width() < 990){

				sidebar.addClass("hideMenu");

				$("#main_content").css({"--max-width-content" : "inherit", "transition" : ".3s"}); 

				

			}

			aside_user.removeClass("hideAside"); // remove a classe

			

			/* mostra o painel escuro :) */

			 $(".dark_panel").fadeIn(); 

		}

		else{ // Está à mostra 

			aside_user.addClass("hideAside"); /* Esconde o aside */

			/* Conteudo central com  100% de largura  */

			$(".dark_panel").hide(); // Esconde o painel 

			

			if($(window).width() < 900){

				$("#main_content").css({"--max-width-content" : "100%", "transition" : "none"});

			

		} 

	}
		

}

}
$(function(){
		

	var btn_menu = $(".btn_menu");

	var li_menuAside = $(".aside_tabs li");

	var iconMenu = 	btn_menu.filter("[data-side=left]");

	var iconUser = btn_menu.filter("[data-side=right]");
	var firstClick = false; 

  

	/* Adiciona ou remove a classe do topo */ 

	var positionScroll = window.scrollY; // Armazena a posição do scroll da página

	var headerTopo = document.getElementsByClassName("topo")[0]; // elemento à adicionar a classe 
	// Adiciona a classe fixed se a janela for aberta com o scrollY > 0 e a correção do sidebar_menu o/

	if(positionScroll) {

		headerTopo.classList.add("fixed"); 

		$(".sidebar").addClass("fixed");

	}

	/* quando rolar a página adiciona a classe fixed no header */

	$(window).scroll(function(e){

		if(this.scrollY > 0){

			

			$("header.topo, .sidebar").addClass("fixed");			

				if(($(".sidebar").hasClass("hideMenu"))){
				/*	$("#sidebar_menu").css("--fix-sidebar-menu", "");*/

					$("#main_content").css("margin-left", ""); 

					if($(window).width() < 990){$("#main_content").css("margin-left", "");}
					

				}else{

					/*$("#sidebar_menu").css("--fix-sidebar-menu", "210px");*/

					

					$("#main_content").css("margin-left", "210px"); 

					

					if($(window).width() < 990){
						if($(".sidebar").hasClass("sidebar_mobile") || ($(".sidebar").hasClass("hideMenu"))){

								$("#main_content").css("margin-left", ""); 

						}

					}

				}	}else{
			$("#main_content").css("margin-left", ""); 

			$("header.topo, .sidebar").removeClass("fixed");

				
		}

		

	}); 

	/* Quando clicar nos botões do menu */

	btn_menu.on("click", function(){		/* Verifica se a página é maior que 910px - COMPUTADOR */

		if($(window).width() > 990 ){
			/* Chama a função e passa o lado que esta a disparar o evento */

			toggleMenu($(this).data("side"));
	/*	if($(this).data("side") == "right"){	

			document.documentElement.style.overflow = "hidden"; // Firefox e Chrome 

			document.body.scroll = "no"; // Ie  

		}*/
			

		}
		else{ // "TELEMÓVEL"
			

			/* Se for o primeiro clique*/

			if(!firstClick && $(this).data("side") == "left") {

				/* se o lado clicado foi o esquerdo */

					/* remove a classe que esconde o sidebar no telemovel */

					$(".sidebar").removeClass("sidebar_mobile");

					$(".sidebar").removeClass("hideMenu");

					$("#aside_user").addClass("hideAside");

					firstClick = true;		// Passa o primeiro clique para TRUE

					$(".dark_panel").fadeIn(); // Mostra o painel escuro

					$("#main_content").addClass("openedMenu");

				}
				else{
					toggleMenu($(this).data("side")); /* Chama a função e passa o lado */} 		}
	});
/*	var dark_panel = document.getElementsByClassName("dark_panel")[0];
	dark_panel.onmouseover = function(){

		document.documentElement.style.overflow = "visible"; // Firefox e Chrome 

			document.body.scroll = "yes"; // Ie 

	}
	dark_panel.onmouseout = function(){

		document.documentElement.style.overflow = "hidden"; // Firefox e Chrome 

			document.body.scroll = "no"; // Ie  

	}*/
			

	/* Clique na div "blur" */

	$(".dark_panel").on("click", function(){
		/* Se na versão mobile o clique for maior que 1 */

		if(firstClick && $(window).width() < 990){

			$(".sidebar").addClass("hideMenu"); // Esconde o sidebar  

		}

			$("#aside_user").addClass("hideAside"); 

			$("#main_content").css({"--max-width-content":"100%", "margin-left" : "auto"}).removeClass("openedMenu"); 

			$(this).hide();

	});
	/* Dispara um clique no btn_menu quando clica no botão de fechar - VER MELHOR DEPOIS!*/

	$(".sidebar .close_nav").on("click", function(){

		iconMenu.trigger("click");

		$(".dark_panel").trigger("click");

		

	}); 	/* Tabs do Aside */

	li_menuAside.on("click", function(){

		li_menuAside.removeClass("li_active").find("a.user_active").removeClass("user_active");

		$(this).addClass("li_active").find("a").addClass("user_active");

			

	});
	/* Funcionalidade do menu */

	$(".li_dropdown").on("click", function(e){

		var linkToOpenList = $(this).find("a").first();
if(linkToOpenList.hasClass("closed")){

			e.preventDefault();
			linkToOpenList.removeClass("closed").addClass("opened");

			

			linkToOpenList.find(".fa-angle-left").removeClass("fa-angle-left").addClass("fa-angle-down");

				

			$(this).find(".dropdown_nav").fadeIn();
		}else{

			linkToOpenList.find(".fa-angle-down").removeClass("fa-angle-down").addClass("fa-angle-left");

			linkToOpenList.removeClass("opened").addClass("closed");

			$(this).find(".dropdown_nav").hide(); 

		}

	});});