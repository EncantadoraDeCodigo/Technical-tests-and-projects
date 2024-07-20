const axios = require('axios');
const sizeOf = require('image-size');

const imgUrl = 'https://depor.com/resizer/crzkitvd2v51Tsyw_Xc1A4enYVs=/1200x900/smart/filters:format(jpeg):quality(75)/cloudfront-us-east-1.images.arcpublishing.com/elcomercio/DAYT2F5NUNB7VPAFKUPHNDXVQA.jpg';

async function getAspectRatio(url) {
    try {
        // Descargar la imagen
        const response = await axios.get(url, { responseType: 'arraybuffer' });
        const dimensions = sizeOf(response.data);

        // Obtener dimensiones de la imagen
        const width = dimensions.width;
        const height = dimensions.height;

        // Calcular aspect ratio
        const aspectRatio = width / height;

        // Formatear el aspect ratio
        const formattedAspectRatio = `${aspectRatio.toFixed(2)}:1`;

        return formattedAspectRatio;
    } catch (error) {
        console.error('Error al obtener el aspect ratio:', error);
        throw error;
    }
}

// Llamar a la función y manejar el resultado
getAspectRatio(imgUrl)
    .then(aspectRatio => {
        console.log('El aspect ratio de la imagen es:', aspectRatio);
    })
    .catch(error => {
        console.error('Error:', error);
    });







