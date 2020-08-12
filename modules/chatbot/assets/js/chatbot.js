export const Chatbot = {
    /** Get param from URL */
    getParamFromURL: (matcher) => window.location.href.match(new RegExp(matcher + '(?=\\?)', 'g')),

    /** CRUD. Docs for Request on https://github.github.io/fetch/#options */
    fetchData(callback, request = {}, path = null, dataFetch = false, autocomplete = []) {
        fetch(request).then(response => {
            if (response.ok) {
                return response.json();
            } else {
                let error = new Error('Something went wrong on api server!');
                error.response = response;
                throw error;
            }
        }).then(data => {
            if (typeof callback === 'function') {
                if (autocomplete.length >= 1) {
                    if (typeof autocomplete[0] === 'string') {
                        if (typeof autocomplete[1] === 'string') {
                            if (typeof autocomplete[2] === 'number') {
                                callback(autocomplete[0], autocomplete[1], autocomplete[2], data);
                            } else {
                                callback(autocomplete[0], autocomplete[1], 2, data);
                            }
                        }
                    }
                } else {
                    if (dataFetch) {
                        if (path !== null) {
                            callback(path, data);
                        } else {
                            callback(data);
                        }
                    } else {
                        callback();
                    }
                }
            }
        }).catch(error => console.log(error));
    },

    substringMatcher(strings) {
        return function findMatches(q, cb) {
            let matches = [];
            let substrRegex = new RegExp(q, 'i');
            $.each(strings, function (i, str) {
                if (substrRegex.test(str)) {
                    matches.push(str);
                }
            });
            cb(matches);
        }
    },

    /** Autocomplete with twitter typeahead on https://twitter.github.io/typeahead.js/examples/ */
    autocomplete(selector, name, dataFetch, minLength = 2) {
        $(selector).typeahead({
                hint: true,
                highlight: true,
                minLength: minLength
            },
            {
                name: name,
                source: this.substringMatcher(dataFetch)
            })
    },
};