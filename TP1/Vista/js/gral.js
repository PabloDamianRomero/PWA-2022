function capturarElem($elem) {
    var $id = $elem.id;
    var $contenido = "";
    var $parrafo = document.getElementById('parrafo-dinamico');
    if ($id == "a-yoga") {
        $contenido += "<p>Beneficios del yoga: </p><ul><li>Reducir su presión arterial y su frecuencia cardíaca</li><li>Ayudarle a relajarse</li><li>Mejorar su confianza en usted mismo</li><li>Mejorar su coordinación</li><li>Reducir el estrés</li><li>Mejorar su concentración</li><li>Ayudarle a dormir mejor</li><li>Ayudar a la digestión</li></ul>";
    }

    if ($id == "a-bici") {
        $contenido += "<p>Beneficios de andar en bicicleta: </p><ul><li>Oxigena el cerebro y combate el estrés</li><li>Tonifica y fortalece la espalda</li><li>Corazón fuerte</li><li>Sistema inmunológico resistente</li><li>Corazón fuerte</li><li>Adiós a la celulitis</li></ul>";
    }

    if ($id == "a-correr") {
        $contenido += "<p>Beneficios al correr: </p><ul><li>Lo puede hacer cualquier persona. </li><li>Es práctico. </li><li>Mantiene el cuerpo en forma.</li><li>Disminuye el riesgo de ciertas enfermedades</li><li>Ayuda a mantener la línea</li><li>Se generan endorfinas</li></ul>";
    }

    if ($id == "a-nat") {
        $contenido += "<p>Beneficios de la natación: </p><ul><li>Oxigena el cerebro y combate el estrés</li><li>Tonifica y fortalece la espalda</li><li>Corazón fuerte</li><li>Sistema inmunológico resistente</li><li>Corazón fuerte</li><li>Adiós a la celulitis</li></ul>";
    }

    if ($id == "a-abs") {
        $contenido += "<p>Beneficios de hacer abdominales: </p><ul><li>Respira mejor gracias a los abdominales</li><li>Protegen nuestros órganos</li><li>Los abdominales, claves para el equilibrio</li><li>Acaba con los dolores de espalda</li></ul>";
    }

    if ($id == "a-bailar") {
        $contenido += "<p>Beneficios al bailar: </p><ul><li>Mejor salud</li><li> Músculos más fuertes</li><li>Mejor equilibrio y coordinación</li><li>Huesos más fuertes</li><li>Menor riesgo de demencia</li><li>Mejor memoria</li><li>Menos estrés</li><li>Más energía</li><li>Mejor estado de ánimo</li></ul>";
    }

    if ($id == "a-caminar") {
        $contenido += "<p>Beneficios al caminar: </p><ul><li>Disminuye el riesgo de ser hipertenso.</li><li>Produce efectos favorables sobre el colesterol.</li><li>Puede ayudar a prevenir la aparición de diabetes.</li><li>Puede mejorar tu vida sexual.</li><li>Aumenta los niveles de Vitamina D.</li><li>Ayuda a perder peso.</li></ul>";
    }

    if ($id == "a-cuerda") {
        $contenido += "<p>Beneficios al saltar la cuerda: </p><ul><li>Quema calorías</li><li>Mejora la resistencia</li><li>Fortalece el corazón.</li><li>Involucra a gran cantidad de músculos.</li><li>Es para todo el mundo.</li><li>Es divertido.</li></ul>";
    }

    if ($id == "a-canotaje") {
        $contenido += "<p>Beneficios de hacer canotaje: </p><ul><li>Aumentar la flexibilidad</li><li>Elimina el estrés o las tensiones.</li><li>Fortalecer los músculos de los brazos, la espalda y el tronco.</li><li>Incrementar la coordinación motriz fina (necesaria para realizar actividades que requieren precisión) y gruesa (movimientos que involucran varios grupos musculares).</li><li>Te divierte</li></ul>";
    }

    if ($id == "a-patinar") {
        $contenido += "<p>Beneficios al patinar: </p><ul><li>Mejora el tono muscular de las piernas </li><li>Quema gran cantidad de calorías </li><li>Mejora el equilibrio </li><li> Fortalece el corazón y los pulmones</li><li>Tiene un menor impacto en las articulaciones que correr</li><li>Mejora la coordinación motriz</li></ul>";
    }

    if ($id == "a-sentadilla") {
        $contenido += "<p>Beneficios de las sentadillas: </p><ul><li>Aumenta la fuerza</li><li>Piernas y glúteos más definidos</li><li>Mejora la movilidad</li><li>Estabiliza tu cuerpo</li><li>Útil para tu espalda</li></ul>";
    }

    if ($id == "a-pilates") {
        $contenido += "<p>Beneficios al hacer pilates: </p><ul><li>Aumenta la flexibilidad, la agilidad y la coordinación de los movimientos.</li><li>Corrige hábitos posturales perjudiciales y reduce los dolores de espalda.</li><li>Aporta vitalidad y fuerza.</li><li>Es útil para conocer mejor el propio cuerpo.</li><li>Previene de lesiones musculares y ayuda en procesos de rehabilitación.</li><li>Combate el estrés y la ansiedad a través del control de la respiración y de la concentración.</li></ul>";
    }

    $parrafo.innerHTML = $contenido;
}

