module.exports = {
    env: {
        browser: true,
        es6: true,
        commonjs: true,
    },
    extends: [
        'airbnb-base',
        'eslint:recommended',
        'plugin:vue/strongly-recommended',
    ],
    globals: {
        Atomics: 'readonly',
        SharedArrayBuffer: 'readonly',
        Vue: true,
        axios: true,
    },
    parserOptions: {
        ecmaVersion: 2018,
        sourceType: 'module',
    },
    rules: {
        'no-console': 2,
        'no-empty': 0,
        'consistent-return': 0,
        'no-await-in-loop': 0,
        indent: ['error', 4],
        '@vue/comment-directive': 0,
    },
};
