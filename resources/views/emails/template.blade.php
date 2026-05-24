@extends('emails.app')

@section('content')

    <h3>{{isset($content['title']) ? $content['title'] : 'Greeting from '.config('app.name')}}</h3>
    @if ($content['paragraph'])
        <p>
            {!! $content['paragraph']  !!}
        </p>
    @endif

    @if (isset($content['name']))
        <table class="body-action" align="center" width="100%" cellpadding="0"
               cellspacing="0" style="border: 1px solid #ddd;">
            <tr>
                <th align="left" style="border-bottom: 1px solid #ddd;padding: 5px;border-right: 1px solid #ddd">
                    Name
                </th>
                <td style="border-bottom: 1px solid #ddd;padding: 5px;">
                    {{ $content['name'] }}
                </td>
            </tr>
            <tr>
                <th align="left" style="border-bottom: 1px solid #ddd;padding: 5px;border-right: 1px solid #ddd">
                    Email
                </th>
                <td style="border-bottom: 1px solid #ddd;padding: 5px;">
                    {{ $content['email'] }}
                </td>
            </tr>
            <tr>
                <th align="left" style="border-bottom: 1px solid #ddd;padding: 5px;border-right: 1px solid #ddd">
                    Phone
                </th>
                <td style="border-bottom: 1px solid #ddd;padding: 5px;">
                    {{ $content['phone'] }}
                </td>
            </tr>
            <tr>
                <th align="left" style="padding: 5px;border-right: 1px solid #ddd">
                    Message
                </th>
                <td style="padding: 5px;">
                    {{ $content['message'] }}
                </td>
            </tr>
        </table>
    @endif

    @if (isset($content['url']))
        <table class="body-action" align="center" width="100%" cellpadding="0"
               cellspacing="0">
            <tr>
                <td align="center">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td align="center">
                                <table border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td>
                                            <a href="{{$content['url']}}"
                                               class="button button--"
                                               style="    background: repeating-linear-gradient(to right bottom, green, grey);
    padding: 8px;
    text-transform: uppercase;
    text-decoration: none;
"
                                               target="_blank">{{isset($content['url_title']) ? $content['url_title'] : "View Activity"}}</a>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    @endif
    <br />
    <p>
        Thank you
    </p>

@stop