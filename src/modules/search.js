import $ from 'jquery';

class Search{



    //1- Describe and create/initiate our object
    constructor(){

        this.openButton = $(".js-search-trigger");
        this.closeButton =$(".search-overlay__close");
        this.searchOverlay =$(".search-overlay");
        this.searchField= $("#search-term");
        this.events();
        this.isOverlayOpen = false;
        this.typingtimer;

    }

    // 2. events
    //on this head feels cold, wearsHat
    // on this brain feels hot, going swimming

    events(){
                this.openButton.on("click",this.openOverlay.bind(this));
                this.closeButton.on("click",this.closeOverlay.bind(this));
                // $(document).on("keyup",this.keyPressDispatcher.bind(this));
                $(document).on("keydown",this.keyPressDispatcher.bind(this));  //firing multiple time over and over if you hold down
                this.searchField.on("keydown", this.typingLogic);

    }

    // 3. Metho(function, actions..)

    typingLogic(){

        // alert("Hello from typing logic");
        clearTimeout(this.typingtimer);
        this.typingtimer =setTimeout(function() { alert('this is time out test');}, 2000); //takes two parameter. first function has to run second the wait time. how much wait before going to run that function

    }

    openOverlay(){
            this.searchOverlay.addClass("search-overlay--active");
            $("body").addClass("body-no-scroll");
            this.isOverlayOpen = true;
    }

    closeOverlay(){
        this.searchOverlay.removeClass("search-overlay--active");
        $("body").removeClass("body-no-scroll");
        this.isOverlayOpen= false;
    }

    keyPressDispatcher(e){
        // console.log(e.keyCode);
        if(e.keyCode==83 && !this.isOverlayOpen){
            this.openOverlay();
        }
        if(e.keyCode == 27 && this.isOverlayOpen){
            this.closeOverlay();
        }
        

    }

}


export default Search


// three main area, constrcutor , where describe our object, intiate