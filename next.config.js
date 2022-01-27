const twitchRedirectDefaults = {
  destination: 'https://twitch.tv/susbatuhan',
  permanent: false,
}

module.exports = {
  async redirects() {
    return [
      {
        ...twitchRedirectDefaults,
        source: '/live',
      },
      {
        ...twitchRedirectDefaults,
        source: '/tv',
      }
    ]
  },
}
