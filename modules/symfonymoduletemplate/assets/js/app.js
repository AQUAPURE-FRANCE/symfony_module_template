import '../scss/app.scss';
import {SymfonyModule} from "./symf_module";

/** Example of fetch implementation */
/*
SymfonyModule.fetchData(
    null,
    new Request(
        url,
        {
            method: 'GET',
            headers: new Headers({
                    'Content-Type': 'application/json', // All Type MIME on https://developer.mozilla.org/fr/docs/Web/HTTP/Basics_of_HTTP/MIME_types/Common_types
                    'Accept-Charset' : 'utf-8'
                }
            ),
            body: JSON.stringify(''),
            credentials: 'omit',
            mode: 'cors',
            cache: 'default'
        }
    ),
    null,
    true,
    []
);
*/
alert('JS Symfony Module loaded!');