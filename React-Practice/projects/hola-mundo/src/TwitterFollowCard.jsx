import { useState } from "react"


export function TiwtterFollowCard ({ userName, children }){
    
    const [isFollowing, setIsFollowing]= useState(false)

    const text = isFollowing? 'Siguiendo' : 'Seguir'
    const buttonClassName = isFollowing ? 'tw-follow-card-button is-following' :
    'tw-follow-card-button'

    const handleClick = () => {
        setIsFollowing(!isFollowing)
    }
    
    return(
        <article className='tw-follow-card'>
            <header className='tw-follow-card-header'>
                <img className='avatar' 
                src= {`https://unavatar.io/github/${userName}?fallback=https://avatar.vercel.sh/37t?size=400" alt="Foto del usuario 1`}/>
                <div className='tw-follow-card-info'>
                    <strong>{ children }</strong>
                    <span className='userName'>@{userName}</span>
                </div>
            </header>

            <aside>
                <button className={buttonClassName} onClick={handleClick} >
                    { text }
                </button>
            </aside>
        </article>
    )
}