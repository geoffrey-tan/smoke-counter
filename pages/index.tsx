import type { NextPage } from 'next'
import Image from 'next/image'
import Head from '../components/Head'
import Cigarette from '../assets/images/cigarette.svg'
import Header from '../components/Header'

function Images() {
  return (
    <Image className="img" src={Cigarette} alt="cigarette" />
  )
}

const Home: NextPage = () => {
  return (
    <div>
      <Head />
      <Header />
      <section>
        <section>
          <section id="image-container">
            <Images />
          </section>

          <div className="slider-container">
            <div id="slider-range-max"></div>
          </div>

          <p className="center">
            <span id="counter">currentValue</span> out of the
            <span id="counterMax">maxValue</span> max cigarettes a day
          </p>
        </section>

        <section>
          <section>
            <h2><strong>Assistant</strong></h2>
            <p id="idTemp"></p>
          </section>
        </section>
      </section>

      <a href="/smokecounter/chat"><button>Open Chat</button></a>
    </div>
  )
}

export default Home
