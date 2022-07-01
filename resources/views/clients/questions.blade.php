<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>KRB</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>

    
    
    <div class="flex flex-col md:mx-20 py-5">
        
        <div>
            <img src={{asset('assets/img/krb.jpg')}} class="h-28 mx-auto"  />
        </div>
        <div class="flex flex-col mx-20">
            <div class="mx-auto bg-green-500 p-4 rounded-lg text-white text-2xlf font-black">Thank for visiting Kenya Roads Board.</div>
            <div class="p-5">
                We care about your experience! We would like you to focus on the satisfaction level that you have experienced in KRB. 
On a scale of 1 to 5 where 1 IS VERY DISSATISFIED and 5 IS VERY SATISFIED, how satisfied are you with the following areas of customer care at KRB?

            </div>

        </div>
        <div class="flex flex-row">
            <a href="{{url('/admin')}}" class="text-gray-900 bg-gradient-to-r from-lime-200 via-lime-400 to-lime-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-lime-300 dark:focus:ring-lime-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Admin</a>

        </div>
        <form action="{{url('clients/startquiz')}}" method="POST">

            @csrf

        <div>
            <div class="flex justify-center">
                <div class="mb-3 xl:w-96">
                  <label for="exampleText0" class="form-label inline-block mb-2 text-gray-700"
                    >Phone Number</label
                  >
                  <input
                  name="phone_number"
                    type="text"
                    class="
                      form-control
                      block
                      w-full
                      px-3
                      py-1.5
                      text-base
                      font-normal
                      text-gray-700
                      bg-white bg-clip-padding
                      border border-solid border-gray-300
                      rounded
                      transition
                      ease-in-out
                      m-0
                      focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
                    "
                    id="exampleText0"
                    placeholder="Phone Number"
                    required
                  />
                </div>
              </div>

        </div>
        <div class="">

            <div class="">
            
                
                @foreach ($quiz as $q)
                <input type="hidden" value="{{$q->id}}" name="question[]" />
                <div class="md:text-2xl text-green-500 font-black py-3">{{$q->title}} </div>
                <div class="flex flex-row flex-wrap space-x-4 space-y-3">
                    <div class="flex items-center">
                        <input  id="default-radio-2" type="radio" value="1" name="answer[{{$q->id}}]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" required>
                        <label for="default-radio-2" class="ml-2 text-sm font-medium text-gray-900 ">Very Dissatisfied</label>
                    </div>
                    <div class="flex items-center">
                        <input  id="default-radio-2" type="radio" value="2" name="answer[{{$q->id}}]"class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="default-radio-2" class="ml-2 text-sm font-medium text-gray-900">Dissatisfied</label>
                    </div>
                    <div class="flex items-center">
                        <input  id="default-radio-2" type="radio" value="3" name="answer[{{$q->id}}]"class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="default-radio-2" class="ml-2 text-sm font-medium text-gray-900">Neutral</label>
                    </div>
                    <div class="flex items-center">
                        <input  id="default-radio-2" type="radio" value="4" name="answer[{{$q->id}}]"class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="default-radio-2" class="ml-2 text-sm font-medium text-gray-900">Satisfied</label>
                    </div>
                    <div class="flex items-center">
                        <input  id="default-radio-2" type="radio" value="5" name="answer[{{$q->id}}]"class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="default-radio-2" class="ml-2 text-sm font-medium text-gray-900">Very Satisfied</label>
                    </div>
                    <div class="flex items-center">
                        <input  id="default-radio-2" type="radio" value="99" name="answer[{{$q->id}}]"class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="default-radio-2" class="ml-2 text-sm font-medium text-gray-900">Don’t Know</label>
                    </div>

                </div>


                @endforeach

                <div class="py-6">
                    <button type="submit" class="text-white bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:focus:ring-yellow-900">Submit</button>

                </div>
            </form>
        </div>
        </div>

    </div>
</body>
</html>