import '../styles/globals.css'
import '../styles/style.css'
import '../styles/dashboard.css'
import '../styles/slider.css'
import type { AppProps } from 'next/app'

function MyApp({ Component, pageProps }: AppProps) {
  return <Component {...pageProps} />
}

export default MyApp
