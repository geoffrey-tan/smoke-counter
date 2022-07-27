import NextHead from 'next/head'

interface HeadProps {
  title?: string
}

function Head({ children, title }: React.PropsWithChildren<HeadProps>) {
  return (
    <NextHead>
      <title>{title || 'Smoke Counter'}</title>
      <link rel="icon" href="/favicon.ico" />
      <link rel="apple-touch-icon" sizes="180x180" href="/touch-icon-iphone-retina.png"></link>
      {children}
    </NextHead>
  )
}

export default Head
