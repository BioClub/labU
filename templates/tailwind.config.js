/** @type {import('tailwindcss').Config} */
module.exports = {
  //content: ["./*.{php,html,js}"],
  content: ["*"],
  theme: {
    fontFamily: {
      'sans': ["Helvetica Neue", 'ui-sans-serif', 'system-ui',' -apple-system', 'BlinkMacSystemFont', "Segoe UI", 'Roboto, Arial', "Noto Sans", 'sans-serif', "Apple Color Emoji"],
    },
    screens: {
      sm: '480px',
      md: '768px',
      lg: '976px',
      xl: '1440px',
    },
    extend: {
    },
  },
  plugins: [],
}

