import $ from 'jquery';

class Search{



    //1- Describe and create/initiate our object
    constructor(){

        this.openButton = $(".js-search-trigger");
        this.closeButton =$(".search-overlay__close");
        this.searchOverlay =$(".search-overlay");
        this.events();

    }

    // 2. events
    //on this head feels cold, wearsHat
    // on this brain feels hot, going swimming

    events(){
                this.openButton.on("click",this.openOverlay.bind(this));
                this.closeButton.on("click",this.closeOverlay.bind(this));
                $(document).on("keyup",this.keyPressDispatcher.bind(this))


    }

    // 3. Metho(function, actions..)

    openOverlay(){
            this.searchOverlay.addClass("search-overlay--active");
            $("body").addClass("body-no-scroll");
    }

    closeOverlay(){
        this.searchOverlay.removeClass("search-overlay--active");
        $("body").removeClass("body-no-scroll");
    }

    keyPressDispatcher(){
        console.log("this is a test");
    }

}


export default Search


// three main area, constrcutor , where describe our object, intiate