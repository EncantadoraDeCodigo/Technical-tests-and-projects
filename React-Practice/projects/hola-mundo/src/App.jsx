import React from 'react'
import './app.css'
import { TiwtterFollowCard } from './TwitterFollowCard'

export function App(){
    return(
        <section className='App'>
            <TiwtterFollowCard  userName='Ninja'>
            Ninja Programador 
            </TiwtterFollowCard>
            
            <TiwtterFollowCard  userName='Kratos'>
                Kratos
            </TiwtterFollowCard>

            <TiwtterFollowCard  userName='GitHub'>
                TerminalGatuna
            </TiwtterFollowCard>
        </section>
    )
}
