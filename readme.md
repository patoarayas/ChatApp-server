### ChatApp REST API Server

Servidor Rest para ser consumido por aplicación Android [ChatApp](https://github.com/patoarayas/ChatApp), como parte del curso de Desarrollo de Soluciones Móviles.

El Backend está desarrollado usando Laravel 5.8.

### Autor:
Patricio Araya González

### API Endpoints

La API cuenta con los siguientes endpoints:

- Auth:
 - **descripción:** En base a las credencianles provistas retorna el api token que identifica al usuario.
 - **method:** *POST*
 - **route:** /api/auth/?email={*email*}&password={*password*}
- Index:
 - **descripción:** Retorna los usuarios registrados.
 - **method:** *GET*
 - **route:** /api/chat/
- Show:
 - **descripción:** Retorna las conversaciones y mensajes del usuario.
 - **method:** *GET*
 - **route:** /api/chat/{*api token*}
- Store:
 - **descripción:** Crea una nueva conversación con un usuario.
 - **method:** *POST*
 - **route:** /api/chat/?api_token={*api token*}&to={*user id*}
- Update:
 - **descripción:** Crea un nuevo mensaje y lo agrega a una conversación.
 - **method:** *PUT*
 - **route:** /api/chat/{*api token*}/?conversation_id={*conversation id*}&content={*message content*}&loc_longitude={*localization longitude*}&loc_latitude={*localization latitude*}&loc_error={*localization error*}
