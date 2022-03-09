function Emoji ({className,label,symbol}){
    return (
    <span
        className={className}
        role="img"
        aria-label={label ? label : ""}
        aria-hidden={label ? "false" : "true"}
    >
        {symbol}
    </span>
    )
}

function Presentation({name,pp}){
    return(
    <React.Fragment>
        <div id="titlePF">
            <h1>PortFolio {name}</h1>
            <p id="presentationText"> Hello <Emoji symbol='👋' label="shakingHand" className='animatedHand'/><br/> I'm currently a junior web developper full stack in 2nd year at the IMT-Nord-Europe in France <Emoji symbol='💻' label='laptop'/></p>
        </div>
        
        <div id="imgWrap">
            <img  id="ppPresentation" src={pp} alt="photo profil"/>
        </div>
        <div id="contentsTable">
            <h2>Contents</h2>
            <ul id="contentsList">
                <li><a href="./projects.html" class="contents">Projects</a></li>
                <li><a href="./technos.html" class="contents">Techno I use</a></li>
                <li><a href="./addPresentation()aboutMe.html" class="contents">About me</a></li>
                <li><a href="./public/Resume-GuillaumeFAURE-eng.pdf" class="contents" target="blank">Resume</a></li>
                <li><a href="./contact.html" class="contents">Contact</a></li>            
            </ul>
        </div>
    </React.Fragment>
    )
}

ReactDOM.render(
    <Presentation 
        name='Guillaume FAURE' 
        pp='../assets/LofiWallpaper3.png'
    />,
     document.querySelector('#presentationPage')
)

