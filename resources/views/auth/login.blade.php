@extends('layouts.main')
@section('content')
    <div class="relative flex w-full items-center justify-center h-full  bg-slate-900">
        {{-- end --}}
        <div class="absolute left-0 top-0 w-full h-full opacity-5 z-0" id="particles-js"></div>



        <form
            class="flex flex-col gap-4 min-h-96 min-w-96 z-10 bg-white/20 backdrop-blur p-8 rounded-md border border-white/30"
            method="post" action='/entrar'>
            @csrf
            <!-- end -->
            <div class="flex flex-col items-center gap-2 text-white">
                <h1 class="font-bold text-3xl p-2 flex justify-center items-center bg-blue-500 rounded-full">
                    G+</h1>
                <h1>iniciar sessão</h1>
            </div>
            <div class="flex flex-col">
                <x-bladewind::input type="text" name='nome' autofocus label="Nome do usuario" id='any-text'
                    required />
                {{-- end --}}
                <x-bladewind::input type="password" viewable name='senha' label='Senha' required />
            </div>
            <!-- end -->
            <div class="container-row">
                <x-bladewind::checkbox name="lembrar" label='lembrar' value='true' label_css='text-gray-500' />
            </div>
            <!-- end -->
            @if (session()->has('error'))
                <x-bladewind::alert type="warning"> {{ session()->get('error') }}</x-bladewind::alert>
            @endif
            <!-- end -->
            <div class="flex flex-col z-10">
                <x-bladewind::button can_submit>
                    entrar
                </x-bladewind::button>
            </div>
            <!-- end -->
        </form>

    </div>
    {{-- end --}}
    <script src="{{ asset('js/particles.min.js') }}"></script>

    <script>
        particlesJS('particles-js',

            {
                "particles": {
                    "number": {
                        "value": 80,
                        "density": {
                            "enable": true,
                            "value_area": 800
                        }
                    },
                    "color": {
                        "value": "#ffffff"
                    },
                    "shape": {
                        "type": "circle",
                        "stroke": {
                            "width": 0,
                            "color": "#000000"
                        },
                        "polygon": {
                            "nb_sides": 5
                        },
                        "image": {
                            "src": "img/github.svg",
                            "width": 100,
                            "height": 100
                        }
                    },
                    "opacity": {
                        "value": 0.5,
                        "random": false,
                        "anim": {
                            "enable": false,
                            "speed": 1,
                            "opacity_min": 0.1,
                            "sync": false
                        }
                    },
                    "size": {
                        "value": 5,
                        "random": true,
                        "anim": {
                            "enable": false,
                            "speed": 40,
                            "size_min": 0.1,
                            "sync": false
                        }
                    },
                    "line_linked": {
                        "enable": true,
                        "distance": 150,
                        "color": "#ffffff",
                        "opacity": 0.4,
                        "width": 1
                    },
                    "move": {
                        "enable": true,
                        "speed": 6,
                        "direction": "none",
                        "random": false,
                        "straight": false,
                        "out_mode": "out",
                        "attract": {
                            "enable": false,
                            "rotateX": 600,
                            "rotateY": 1200
                        }
                    }
                },
                "interactivity": {
                    "detect_on": "canvas",
                    "events": {
                        "onhover": {
                            "enable": true,
                            "mode": "repulse"
                        },
                        "onclick": {
                            "enable": true,
                            "mode": "push"
                        },
                        "resize": true
                    },
                    "modes": {
                        "grab": {
                            "distance": 400,
                            "line_linked": {
                                "opacity": 1
                            }
                        },
                        "bubble": {
                            "distance": 400,
                            "size": 40,
                            "duration": 2,
                            "opacity": 8,
                            "speed": 3
                        },
                        "repulse": {
                            "distance": 200
                        },
                        "push": {
                            "particles_nb": 4
                        },
                        "remove": {
                            "particles_nb": 2
                        }
                    }
                },
                "retina_detect": true,
                "config_demo": {
                    "hide_card": false,
                    "background_color": "#b61924",
                    "background_image": "",
                    "background_position": "50% 50%",
                    "background_repeat": "no-repeat",
                    "background_size": "cover"
                }
            }

        );
    </script>

    {{-- end --}}
@endsection
