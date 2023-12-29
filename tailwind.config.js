/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./*.{php,html,js}","./template-parts/*.{php,html,js}"
  ],
  theme: {
    screens:  {
      'xs': '320px',
      // => @media (min-width: 320px) { ... }

      'sm': '640px',
      // => @media (min-width: 640px) { ... }

      'md': '768px',
      // => @media (min-width: 768px) { ... }

      'lg': '1024px',
      // => @media (min-width: 1024px) { ... }

      'xl': '1280px',
      // => @media (min-width: 1280px) { ... }

      '2xl': '1300px',
      // => @media (min-width: 1536px) { ... }
    },
    extend:{
      colors: {
        'white': '#ffffff',
        'black': '#000000', 
      },
      backgroundImage: {
        'term-banner': "url('/uploads/term-banner.webp')",
      },
      fontFamily:{
        nunito : ['Nunito'],
          lato : ['Lato'],
        futurabook : ['futurabook , sans'],
        OpenSans : ['Open Sans'],
      }
    },
  },
  plugins: [],
}
