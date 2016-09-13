    $('#formLogin').bootstrapValidator({
        container: 'tooltip',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            email: {
                validators: {
                    notEmpty: {
                        message: 'Introduce tu correo electrónico.'
                    }
                }
            },
            pass: {
                validators: {
                    notEmpty: {
                        message: 'Introduce tu contraseña.'
                    }
                }
            }
        }
    });

    $('#formCodigo').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            email: {
                validators: {
                    notEmpty: {
                        message: 'Introduce tu correo electrónico.'
                    }
                }
            },
            codigo: {
                validators: {
                    notEmpty: {
                        message: 'Introduce tu código de regalo.'
                    },
                    stringLength: {
                        min: 10, max: 20,
                        message: 'El codigo es invalido.'
                    }
                }
            }
        }
    });

    function randomNumber(min, max) {
        return Math.floor(Math.random() * (max - min + 1) + min);
    };

    $('#captchaOperation').html([randomNumber(1, 100), '+', randomNumber(1, 200), '='].join(' '));

    $('#formContra').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            captcha: {
                validators: {
                    callback: {
                        message: 'Respuesta Incorrecta',
                        callback: function (value, validator) {
                            var items = $('#captchaOperation').html().split(' '),
                                    sum = parseInt(items[0]) + parseInt(items[2]);
                            return value == sum;
                        }
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'Introduce tu correo electrónico.'
                    }
                }
            }
        }
    });

    $('#formRegistro').bootstrapValidator({
        container: 'tooltip',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            nombre: {
                validators: {
                    regexp: {
                        regexp: /^[a-z\s]+$/i,
                        message: 'Caracteres invalidos.'
                    },
                    notEmpty: {
                        message: 'Introduce tu nombre.'
                    },
                    stringLength: {
                        max: 20,
                        message: 'El codigo es invalido.'
                    }
                }
            },
            apellido: {
                validators: {
                    regexp: {
                        regexp: /^[a-z\s]+$/i,
                        message: 'Caracteres invalidos.'
                    },
                    notEmpty: {
                        message: 'Introduce tu apellido.'
                    },
                    stringLength: {
                        max: 20,
                        message: 'El codigo es invalido.'
                    }
                }
            },
            usuario: {
                validators: {
                    notEmpty: {
                        message: 'Introduce un nombre de usuario.'
                    },
                    stringLength: {
                        max: 10,
                        message: 'Nombre de usuario invalido.'
                    }
                }
            },
            pais: {
                validators: {
                    notEmpty: {
                        message: 'Selecciona tu país.'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'Introduce tu correo electronico.'
                    }
                }
            },
            pass: {
                validators: {
                    notEmpty: {
                        message: 'Introduce tu contraseña.'
                    },
                    stringLength: {
                        min: 8,
                        message: 'La contraseña debe ser de al menos 8 caracteres.'
                    },
                    identical: {
                        field: 'pass_confirmar',
                        message: 'Las contraseñas no coinciden.'
                    }
                }
            },
            pass_confirmar: {
                validators: {
                    notEmpty: {
                        message: 'Confirma tu contraseña.'
                    },
                    stringLength: {
                        min: 8,
                        message: 'La contraseña es de al menos 8 caracteres.'
                    },
                    identical: {
                        field: 'pass',
                        message: 'Las contraseñas no coinciden.'
                    }
                }
            },
            condiciones: {
                validators: {
                    notEmpty: {
                        message: 'No has aceptado nuestros términos y condiciones.'
                    }
                }
            }
        }
    });

    $('#form_mex').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            direccion: {
                validators: {
                    notEmpty: {
                        message: 'Introduce tu dirección.'
                    },
                    stringLength: {
                        max: 100,
                        message: 'Tienes un límite de 100 caracteres.'
                    }
                }
            },
            cp: {
                validators: {
                    notEmpty: {
                        message: 'Introduce tu código postal.'
                    },
                    regexp: {
                        regexp: /^[0-9\s]+$/i,
                        message: 'Caracteres invalidos.'
                    },
                    stringLength: {
                        min: 5, max: 5,
                        message: 'Código postal invalido.'
                    }
                }
            },
            estado: {
                validators: {
                    notEmpty: {
                        message: 'Selecciona tu estado.'
                    }
                }
            },
            municipio: {
                validators: {
                    notEmpty: {
                        message: 'Introduce tu delegación o municipio.'
                    },
                    regexp: {
                        regexp: /^[a-z\s]+$/i,
                        message: 'Caracteres invalidos.'
                    }
                }
            }
        }
    });

    $('#formAddUser').bootstrapValidator({
        container: 'tooltip',
        feedbackIcons: {
            valid: 'glyphicon',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            tipo: {
                validators: {
                    notEmpty: {
                        message: 'Selecciona un tipo.'
                    }
                }
            },
            membresia: {
                validators: {
                    notEmpty: {
                        message: 'Selecciona membresía.'
                    }
                }
            },
            nombre: {
                validators: {
                    regexp: {
                        regexp: /^[a-z\s]+$/i,
                        message: 'Caracteres invalidos.'
                    },
                    notEmpty: {
                        message: 'Introduce tu nombre.'
                    },
                    stringLength: {
                        max: 20,
                        message: 'El codigo es invalido.'
                    }
                }
            },
            apellido: {
                validators: {
                    regexp: {
                        regexp: /^[a-z\s]+$/i,
                        message: 'Caracteres invalidos.'
                    },
                    notEmpty: {
                        message: 'Introduce tu apellido.'
                    },
                    stringLength: {
                        max: 20,
                        message: 'El codigo es invalido.'
                    }
                }
            },
            pais: {
                validators: {
                    notEmpty: {
                        message: 'Selecciona un país.'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'Introduce un correo electronico.'
                    }
                }
            },
            pass: {
                validators: {
                    notEmpty: {
                        message: 'Introduce una contraseña.'
                    },
                    stringLength: {
                        min: 8,
                        message: 'La contraseña es de al menos 8 caracteres.'
                    }
                }
            }
        }
    });

    $('#formAddCont').bootstrapValidator({
        container: 'tooltip',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            tipo: {
                validators: {
                    notEmpty: {
                        message: 'Selecciona un tipo.'
                    }
                }
            },
            titulo: {
                validators: {
                    regexp: {
                        regexp: /^[a-z\s]+$/i,
                        message: 'Caracteres invalidos.'
                    },
                    notEmpty: {
                        message: 'Introduce un título.'
                    }
                }
            },
            autor: {
                validators: {
                    notEmpty: {
                        message: 'Selecciona un autor.'
                    }
                }
            },
            portada: {
                validators: {
                    notEmpty: {
                        message: 'Selecciona una portada.'
                    }
                }
            },
            anio: {
                validators: {
                    regexp: {
                        regexp: /^[0-9\s]+$/i,
                        message: 'Caracteres invalidos.'
                    },
                    notEmpty: {
                        message: 'Introduce un año.'
                    },
                    stringLength: {
                        min: 4, max: 4,
                        message: 'Año invalido.'
                    }
                }
            },
            categoria: {
                validators: {
                    notEmpty: {
                        message: 'Selecciona una categoría.'
                    }
                }
            },
            enlace: {
                validators: {
                    notEmpty: {
                        message: 'Introduce un enlace.'
                    }
                }
            }
        }
    });

    $('#formAddAutor').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            autor: {
                validators: {
                    notEmpty: {
                        message: 'Introduce un nombre al autor.'
                    },
                    regexp: {
                        regexp: /^[a-z\s]+$/i,
                        message: 'Caracteres invalidos.'
                    }
                }
            }
        }
    });

    $('#formAddCategoria').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            categoria: {
                validators: {
                    notEmpty: {
                        message: 'Introduce un nombre a la categoria.'
                    },
                    regexp: {
                        regexp: /^[a-z\s]+$/i,
                        message: 'Caracteres invalidos.'
                    }
                }
            }
        }
    });

    $('.addButton').on('click', function () {
        var index = $(this).data('index');
        if (!index) {
            index = 1;
            $(this).data('index', 1);
        }
        index++;
        $(this).data('index', index);
        var template = $(this).attr('data-template'),
                $templateEle = $('#' + template + 'Template'),
                $row = $templateEle.clone().removeAttr('id').insertBefore($templateEle).removeClass('hide'),
                $el = $row.find('input').eq(0).attr('name', template + '[]');

        $('#form_articulo').bootstrapValidator('addField', $el);

        if ('checkbox' === $el.attr('type') || 'radio' === $el.attr('type')) {
            $el.val('Choice #' + index)
                    .parent().find('span.lbl').html('Choice #' + index);
        } else {
            $el.attr('placeholder', 'Textbox #' + index);
        }

        $row.on('click', '.removeButton', function (e) {
            $('#form_articulo').bootstrapValidator('removeField', $el);
            $row.remove();
        });
    });

    $('#formArticulo').bootstrapValidator({
        container: 'tooltip',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            nombre: {
                validators: {
                    notEmpty: {
                        message: 'Ponle un nombre a tu artículo.'
                    },
                    stringLength: {
                        max: 20,
                        message: 'Nombre muy largo.'
                    }
                }
            },
            'textbox[]': {
                validators: {
                    notEmpty: {
                        message: 'Selecciona un fotografía.'
                    },
                    file: {
                        extension: 'png',
                        type: 'image/png',
                        message: 'Selecciona una imágen PNG.'
                    }
                }
            },
            precio: {
                validators: {
                    notEmpty: {
                        message: 'Introduce un precio.'
                    },
                    regexp: {
                        regexp: /^[0-9\s]+$/i,
                        message: 'Precio invalido.'
                    }
                }
            },
            condicion: {
                validators: {
                    notEmpty: {
                        message: 'Selecciona la condición de tu artículo.'
                    }
                }
            },
            descripcion: {
                validators: {
                    notEmpty: {
                        message: 'Introduce un descripción del artículo.'
                    },
                    stringLength: {
                        max: 150,
                        message: 'Descripción muy larga.'
                    }
                }
            }
        }
    })
            .on('error.field.bv', function (e, data) {
                //console.log('error.field.bv -->', data.element);
            })
            .on('success.field.bv', function (e, data) {
                //console.log('success.field.bv -->', data.element);
            })
            .on('added.field.bv', function (e, data) {
                //console.log('Added element -->', data.field, data.element);
            })
            .on('removed.field.bv', function (e, data) {
                //console.log('Removed element -->', data.field, data.element);
            });

    $('#formContacto').bootstrapValidator({
        container: 'tooltip',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            asunto: {
                validators: {
                    notEmpty: {
                        message: 'Asunto obligatorio.'
                    }
                }
            },
            prioridad: {
                validators: {
                    notEmpty: {
                        message: 'Selecciona la prioridad.'
                    }
                }
            },
            mensaje: {
                validators: {
                    notEmpty: {
                        message: 'Agrega un mensaje.'
                    },
                    stringLength: {
                        max: 150,
                        message: 'Mensaje muy largo.'
                    }
                }
            }
        }
    });

    $('#form_slide').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            slide: {
                validators: {
                    notEmpty: {
                        message: 'Selecciona un fotografía.'
                    },
                    file: {
                        extension: 'png',
                        type: 'image/png',
                        message: 'Formato incorrecto.'
                    }
                }
            }
        }
    });

    $('#form_slideMarkUno').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            slide: {
                validators: {
                    notEmpty: {
                        message: 'Selecciona un fotografía.'
                    },
                    file: {
                        extension: 'png',
                        type: 'image/png',
                        message: 'Formato incorrecto..'
                    }
                }
            }
        }
    });

    $('#form_slideMarkDos').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            slide: {
                validators: {
                    notEmpty: {
                        message: 'Selecciona un fotografía.'
                    },
                    file: {
                        extension: 'png',
                        type: 'image/png',
                        message: 'Formato incorrecto..'
                    }
                }
            }
        }
    });