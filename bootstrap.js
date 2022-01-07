require.config({
    paths: {
        'docs': ['../addons/cesiummapv/docs'],
    },
    shim: {
        'docs': {
            deps: [
                'jquery',
                '../addons/cesiummapv/spectrum',
                'css!../addons/cesiummapv/spectrum.css',
            ],
        }
    }
});