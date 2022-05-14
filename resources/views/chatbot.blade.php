@extends('layouts.main')

@section('content')


    <!-- <div id="rasa-chat-widget" data-websocket-url="http://localhost:5005"></div>
    <script src="https://unpkg.com/@rasahq/rasa-chat" type="application/javascript"></script> -->
    <script>!(function () {
        let e = document.createElement("script"),
          t = document.head || document.getElementsByTagName("head")[0];
        (e.src =
          "https://cdn.jsdelivr.net/npm/rasa-webchat/lib/index.js"),
          (e.async = !0),
          (e.onload = () => {
            window.WebChat.default(
              {
                customData: { language: "en" },
                socketUrl: "https://rasa-com.roycesurvey.co.ke",
                initPayload: 'get started',
                title:'Welcome to Royce store' 
                // add other props here
              },
              null
            );
          }),
          t.insertBefore(e, t.firstChild);
      })();
      </script>
    
@endsection