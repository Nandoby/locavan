module.exports = {
  content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js"
  ],
  theme: {
    extend: {
        transitionTimingFunction: {
            'cubic': 'cubic-bezier(0.075, 0.82, 0.165, 1)',
        }
    },
  },
  plugins: [
      require('flowbite/plugin')
  ],
}
