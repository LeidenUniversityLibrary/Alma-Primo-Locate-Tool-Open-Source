<div id='mail-body'>
    <div id='markdown'>
        @component('mail::message')
# Exception - {{ env('APP_NAME') }}

---

## What happened?

Something went wrong and the app [{{ env('APP_NAME') }}]({{ env('APP_URL') }}) has thrown an exception.

---

### Beheerder van Dienst tasks

* Place this email in the **_Web** folder
* Notify a developer

---

### Developer Info

This email contains useful information (stack trace) to try and fix the issue.

Happy debugging!

---

**Do not reply.** This is an automatically generated message.

        @endcomponent
    </div>
    <div id=additional-info>
        <h3>Stack Trace</h3>
        <div id='stack-trace'>
        {!! $data !!}
        </div>
    </div>
</div>
