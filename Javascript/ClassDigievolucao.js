Digimon = 
    {
    Sprite : null,
    Nome: null,
    HP: null,
    MP: null,
    Ataque: null,
    Defesa: null,
    Velocidade: null,
    Inteligencia: null,
    Descuidos: null,
    Peso: null,
    Felicidade: null,
    Disciplina: null,
    Batalhas: null,
    NTecnicas: null,

    DigievolucoesPossiveis: null,

    ReqHP: null,
    ReqMP: null,
    ReqAtaque: null,
    ReqDefesa: null,
    ReqVelocidade: null,
    ReqInteligencia: null,
    ReqDescuidos: null,
    ReqPeso: null,
    ReqFelicidade: null,
    ReqDisciplina: null,
    ReqBatalhas: null,
    ReqNTecnicas: null,
    ReqEspecial: null,

    SelecionandoDigimonAtual: function()
        {
        var SelectDigimonAtual =  document.getElementById("SelectDigAtual");
        var DivDigimonRequisitos = document.getElementById("RequisitosDig");
        
        if(SelectDigimonAtual.value == 1)
            {
            this.Sprite = "url(Sprites/Agumon.gif)";
            this.Nome = "Agumon";
            this.DigievolucoesPossiveis = ["Greymon", "Meramon", "Birdramon", "Centarumon", "Monochromon", "Tyrannomon"];
            this.ReqHP = [null, null, null, null, 1000, 1000];
            this.ReqMP = [null, null, null, null, null, null];
            this.ReqAtaque = [100, 100, null, null, null, null];
            this.ReqDefesa = [100, null, null, null, 100, 100];
            this.ReqVelocidade = [100, null, 100, null, null, null];
            this.ReqInteligencia = [100, null, null, 100, 100, null];
            this.ReqDescuidos = [[0,1], [5,100], [3,100], [0,3], [0,3], [0,5]]; //Range maximo = 100 interpretar como >=
            this.ReqPeso = [[25, 35], [15, 25], [15, 25], [25, 35], [35, 45], [25, 35]];
            this.ReqFelicidade = [null, null, null, null, null, null];
            this.ReqDisciplina = [[90, 100], null, null, [60, 100], null, null];
            this.ReqBatalhas = [null, [10, 100], null, null, [0, 5], [0, 5]];
            this.ReqNTecnicas = [35, 28, 35, 28, 35, 28];
            this.ReqEspecial = [null, null, 'Biyomon.gif', null, null, null];
            }

        if(SelectDigimonAtual.value == 2)
            {
            this.Sprite = "url(Sprites/Airdramon.gif)";
            this.Nome = "Airdramon";
            this.DigievolucoesPossiveis = ["Megadramon", "Phoenixmon"];
            this.ReqHP = [3000, 4000];
            this.ReqMP = [5000, 4000];
            this.ReqAtaque = [500, null];
            this.ReqDefesa = [300, null];
            this.ReqVelocidade = [400, 400];
            this.ReqInteligencia = [400, 600];
            this.ReqDescuidos = [[0,100], [0,3]]; //Range maximo = 100 interpretar como >=
            this.ReqPeso = [[50, 60], [25, 35]];
            this.ReqFelicidade = [null, null];
            this.ReqDisciplina = [null, [100, 100]];
            this.ReqBatalhas = [[30, 100], [0, 0]];
            this.ReqNTecnicas = [30, 40];
            this.ReqEspecial = [null, null];
            }

        if(SelectDigimonAtual.value == 3)
            {
            this.Sprite = "url(Sprites/Andromon.gif)";
            this.Nome = "Andromon";
            this.DigievolucoesPossiveis = [null];
            this.ReqHP = [null];
            this.ReqMP = [null];
            this.ReqAtaque = [null];
            this.ReqDefesa = [null];
            this.ReqVelocidade = [null];
            this.ReqInteligencia = [null];
            this.ReqDescuidos = [null];
            this.ReqPeso = [null];
            this.ReqFelicidade = [null];
            this.ReqDisciplina = [null];
            this.ReqBatalhas = [null];
            this.ReqNTecnicas = [null];
            this.ReqEspecial = [null];
            }

        if(SelectDigimonAtual.value == 4)
            {
            this.Sprite = "url(Sprites/Angemon.gif)";
            this.Nome = "Angemon";
            this.DigievolucoesPossiveis = ["Andromon", "Phoenixmon"];
            this.ReqHP = [2000, 4000];
            this.ReqMP = [4000, 4000];
            this.ReqAtaque = [200, null];
            this.ReqDefesa = [400, null];
            this.ReqVelocidade = [200, 400];
            this.ReqInteligencia = [400, 600];
            this.ReqDescuidos = [[0, 5], [0, 3]];
            this.ReqPeso = [[35, 45], [25, 35]];
            this.ReqFelicidade = [null, null];
            this.ReqDisciplina = [[95, 100], [100, 100]];
            this.ReqBatalhas = [[30, 100], [0, 0]];
            this.ReqNTecnicas = [30, 40];
            this.ReqEspecial = [null, null];
            }

        if(SelectDigimonAtual.value == 5)
            {
            this.Sprite = "url(Sprites/Bakemon.gif)";
            this.Nome = "Bakemon";
            this.DigievolucoesPossiveis = ["SkullGreymon", "Giromon"];
            this.ReqHP = [4000, null];
            this.ReqMP = [6000, null];
            this.ReqAtaque = [400, 400];
            this.ReqDefesa = [400, null];
            this.ReqVelocidade = [200, 300];
            this.ReqInteligencia = [500, 400];
            this.ReqDescuidos = [[10, 100], [15, 100]];
            this.ReqPeso = [[25, 35], [0, 10]];
            this.ReqFelicidade = [null, [95, 100]];
            this.ReqDisciplina = [null, null];
            this.ReqBatalhas = [[40, 100], [100, 100]];
            this.ReqNTecnicas = [45, 35];
            this.ReqEspecial = [null, null];
            }

        if(SelectDigimonAtual.value == 6)
            {
            this.Sprite = "url(Sprites/Betamon.gif)";
            this.Nome = "Betamon";
            this.DigievolucoesPossiveis = ["Seadramon", "Whamon", "Shellmon", "Coelamon"];
            this.ReqHP = [1000, 1000, 1000, null];
            this.ReqMP = [1000, null, null, null];
            this.ReqAtaque = [null, null, null, null];
            this.ReqDefesa = [null, null, 100, 100];
            this.ReqVelocidade = [null, null, null, null];
            this.ReqInteligencia = [null, 100, null, null];
            this.ReqDescuidos = [[3, 100], [0, 5], [5, 100], [3, 100]];
            this.ReqPeso = [[25, 35], [35, 45], [35, 45], [25, 35]];
            this.ReqFelicidade = [null, null, null, null];
            this.ReqDisciplina = [null, [60, 100], null, null];
            this.ReqBatalhas = [[0, 5], null, null, [0, 5]];
            this.ReqNTecnicas = [28, 28, 35, 35];
            this.ReqEspecial = [null, null, 'Betamon.gif', null];
            }
    
        if(SelectDigimonAtual.value == 7)
            {
            this.Sprite = "url(Sprites/Birdramon.gif)";
            this.Nome = "Birdramon";
            this.DigievolucoesPossiveis = ["Phoenixmon"];
            this.ReqHP = [4000];
            this.ReqMP = [4000];
            this.ReqAtaque = [null];
            this.ReqDefesa = [null];
            this.ReqVelocidade = [400];
            this.ReqInteligencia = [600];
            this.ReqDescuidos = [[0, 3]];
            this.ReqPeso = [[25, 30]];
            this.ReqFelicidade = [null];
            this.ReqDisciplina = [[100, 100]];
            this.ReqBatalhas = [[0, 0]];
            this.ReqNTecnicas = [40];
            this.ReqEspecial = [null];
            }
    
        if(SelectDigimonAtual.value == 8)
            {
            this.Sprite = "url(Sprites/Biyomon.gif)";
            this.Nome = "Biyomon";
            this.DigievolucoesPossiveis = ["Birdramon", "Airdramon", "Kokatorimon", "Unimon", "Kabuterimon"];
            this.ReqHP = [null, null, 1000, 1000, 1000];
            this.ReqMP = [null, 1000, null, null, 1000];
            this.ReqAtaque = [null, null, null, null, 100];
            this.ReqDefesa = [null, null, null, null, null];
            this.ReqVelocidade = [100, 100, null, 100, 100];
            this.ReqInteligencia = [null, 100, null, null, null];
            this.ReqDescuidos = [[3, 100], [0, 1], [3, 100], [0, 3], [0, 1]];
            this.ReqPeso = [[15, 25], [25, 35], [25, 35], [25, 35], [25, 35]];
            this.ReqFelicidade = [null, null, null, null, null];
            this.ReqDisciplina = [null, [90, 100], null, null, null];
            this.ReqBatalhas = [null, null, null, [10, 100], null];
            this.ReqNTecnicas = [35, 35, 28, 35, 35];
            this.ReqEspecial = ['Biyomon.gif', null, 'Biyomon.gif', null, 'Kunemon.gif'];
            }
    
        if(SelectDigimonAtual.value == 9)
            {
            this.Sprite = "url(Sprites/Botamon.gif)";
            this.Nome = "Botamon";
            this.DigievolucoesPossiveis = ["Koromon"];
            this.ReqHP = [null];
            this.ReqMP = [null];
            this.ReqAtaque = [null];
            this.ReqDefesa = [null];
            this.ReqVelocidade = [null];
            this.ReqInteligencia = [null];
            this.ReqDescuidos = [null];
            this.ReqPeso = [null];
            this.ReqFelicidade = [null];
            this.ReqDisciplina = [null];
            this.ReqBatalhas = [null];
            this.ReqNTecnicas = [null];
            this.ReqEspecial = [null];
            }

        if(SelectDigimonAtual.value == 10)
            {
            this.Sprite = "url(Sprites/Centarumon.gif)";
            this.Nome = "Centarumon";
            this.DigievolucoesPossiveis = ["Andromon", "Giromon"];
            this.ReqHP = [2000, null];
            this.ReqMP = [4000, null];
            this.ReqAtaque = [200, 400];
            this.ReqDefesa = [400, null];
            this.ReqVelocidade = [200, 300];
            this.ReqInteligencia = [400, 400];
            this.ReqDescuidos = [[0,5], [15,100]]; //Range maximo = 100 interpretar como >=
            this.ReqPeso = [[35, 45], [0, 10]];
            this.ReqFelicidade = [null, [95, 100]];
            this.ReqDisciplina = [[95, 100], null];
            this.ReqBatalhas = [[30, 100], [100, 100]];
            this.ReqNTecnicas = [30, 35];
            this.ReqEspecial = [null, null];
            }
            
        if(SelectDigimonAtual.value == 11)
            {
            this.Sprite = "url(Sprites/Coelamon.gif)";
            this.Nome = "Coelamon";
            this.DigievolucoesPossiveis = ["MegaSeadramon"];
            this.ReqHP = [null];
            this.ReqMP = [4000];
            this.ReqAtaque = [500];
            this.ReqDefesa = [400];
            this.ReqVelocidade = [null];
            this.ReqInteligencia = [400];
            this.ReqDescuidos = [[0, 5]];
            this.ReqPeso = [[25, 35]];
            this.ReqFelicidade = [null];
            this.ReqDisciplina = [null];
            this.ReqBatalhas = [[0, 0]];
            this.ReqNTecnicas = [40];
            this.ReqEspecial = [null];
            }

        if(SelectDigimonAtual.value == 12)
            {
            this.Sprite = "url(Sprites/Devimon.gif)";
            this.Nome = "Devimon";
            this.DigievolucoesPossiveis = ["SkullGreymon", "Megadramon"];
            this.ReqHP = [4000, 3000];
            this.ReqMP = [6000, 5000];
            this.ReqAtaque = [400, 500];
            this.ReqDefesa = [400, 300];
            this.ReqVelocidade = [200, 400];
            this.ReqInteligencia = [500, 400];
            this.ReqDescuidos = [[10, 100], [0, 10]];
            this.ReqPeso = [[25, 35], [50, 60]];
            this.ReqFelicidade = [null, null];
            this.ReqDisciplina = [null, null];
            this.ReqBatalhas = [[40, 100], [30, 100]];
            this.ReqNTecnicas = [45, 30];
            this.ReqEspecial = [null, null];
            }

        if(SelectDigimonAtual.value == 13)
            {
            this.Sprite = "url(Sprites/Digitamamon.gif)";
            this.Nome = "Digitamamon";
            this.DigievolucoesPossiveis = [null];
            this.ReqHP = [null];
            this.ReqMP = [null];
            this.ReqAtaque = [null];
            this.ReqDefesa = [null];
            this.ReqVelocidade = [null];
            this.ReqInteligencia = [null];
            this.ReqDescuidos = [null];
            this.ReqPeso = [null];
            this.ReqFelicidade = [null];
            this.ReqDisciplina = [null];
            this.ReqBatalhas = [null];
            this.ReqNTecnicas = [null];
            this.ReqEspecial = [null];
            }

        if(SelectDigimonAtual.value == 14)
            {
            this.Sprite = "url(Sprites/Drimogemon.gif)";
            this.Nome = "Drimogemon";
            this.DigievolucoesPossiveis = ["MetalGreymon"];
            this.ReqHP = [4000];
            this.ReqMP = [3000];
            this.ReqAtaque = [500];
            this.ReqDefesa = [500];
            this.ReqVelocidade = [300];
            this.ReqInteligencia = [300];
            this.ReqDescuidos = [[0, 10]];
            this.ReqPeso = [[60, 70]];
            this.ReqFelicidade = [null];
            this.ReqDisciplina = [[95, 100]];
            this.ReqBatalhas = [[30, 100]];
            this.ReqNTecnicas = [30];
            this.ReqEspecial = [null];
            }

        if(SelectDigimonAtual.value == 15)
            {
            this.Sprite = "url(Sprites/Elecmon.gif)";
            this.Nome = "Elecmon";
            this.DigievolucoesPossiveis = ["Leomon", "Angemon", "Bakemon", "Kokatorimon"];
            this.ReqHP = [null, null, null, 1000];
            this.ReqMP = [null, 1000, 1000, null];
            this.ReqAtaque = [100, null, null, null];
            this.ReqDefesa = [null, null, null, null];
            this.ReqVelocidade = [100, null, null, null];
            this.ReqInteligencia = [100, 100, null, null];
            this.ReqDescuidos = [[0, 1], [0, 0], [3, 100], [3, 100]];
            this.ReqPeso = [[15, 25], [15, 25], [15, 25], [25, 35]];
            this.ReqFelicidade = [null, null, [50, 100], null];
            this.ReqDisciplina = [null, null, null, null];
            this.ReqBatalhas = [[10, 100], null, null, null];
            this.ReqNTecnicas = [35, 35, 28, 28];
            this.ReqEspecial = [null, 'Patamon.gif', null, 'Biyomon.gif'];
            }

        if(SelectDigimonAtual.value == 16)
            {
            this.Sprite = "url(Sprites/Etemon.gif)";
            this.Nome = "Etemon";
            this.DigievolucoesPossiveis = [null];
            this.ReqHP = [null];
            this.ReqMP = [null];
            this.ReqAtaque = [null];
            this.ReqDefesa = [null];
            this.ReqVelocidade = [null];
            this.ReqInteligencia = [null];
            this.ReqDescuidos = [null];
            this.ReqPeso = [null];
            this.ReqFelicidade = [null];
            this.ReqDisciplina = [null];
            this.ReqBatalhas = [null];
            this.ReqNTecnicas = [null];
            this.ReqEspecial = [null];
            }

        if(SelectDigimonAtual.value == 17)
            {
            this.Sprite = "url(Sprites/Frigimon.gif)";
            this.Nome = "Frigimon";
            this.DigievolucoesPossiveis = ["MetalMamemon", "Mamemon"];
            this.ReqHP = [null, null];
            this.ReqMP = [null, null];
            this.ReqAtaque = [500, 400];
            this.ReqDefesa = [400, 300];
            this.ReqVelocidade = [400, 300];
            this.ReqInteligencia = [400, 400];
            this.ReqDescuidos = [[0, 15], [15, 100]];
            this.ReqPeso = [[5, 15], [0, 10]];
            this.ReqFelicidade = [[95, 100], [90, 100]];
            this.ReqDisciplina = [null, null];
            this.ReqBatalhas = [null, null];
            this.ReqNTecnicas = [30, 25];
            this.ReqEspecial = [null, null];
            }

        if(SelectDigimonAtual.value == 18)
            {
            this.Sprite = "url(Sprites/Gabumon.gif)";
            this.Nome = "Gabumon";
            this.DigievolucoesPossiveis = ["Centarumon", "Monochromon", "Drimogemon", "Tyrannomon", "Ogremon", "Garurumon"];
            this.ReqHP = [null, 1000, null, 1000, 1000, null];
            this.ReqMP = [null, null, null, null, null, 1000];
            this.ReqAtaque = [null, null, 100, null, 100, null];
            this.ReqDefesa = [null, 100, null, 100, null, null];
            this.ReqVelocidade = [null, null, null, null, null, 100];
            this.ReqInteligencia = [100, 100, null, null, null, null];
            this.ReqDescuidos = [[0, 3], [0, 3], [3, 100], [0, 5], [5, 100], [0, 1]];
            this.ReqPeso = [[25, 35], [35, 45], [35, 45], [25, 35], [25, 35], [25, 35]];
            this.ReqFelicidade = [null, null, [50, 100], null, null, null];
            this.ReqDisciplina = [[60, 100], null, null, null, null, [90, 100]];
            this.ReqBatalhas = [null, [0, 5], null, [0, 5], [15, 100], null];
            this.ReqNTecnicas = [28, 35, 28, 28, 35, 28];
            this.ReqEspecial = [null, null, null, null, null, null];
            }

        if(SelectDigimonAtual.value == 19)
            {
            this.Sprite = "url(Sprites/Garurumon.gif)";
            this.Nome = "Garurumon";
            this.DigievolucoesPossiveis = ["SkullGreymon", "MegaSeadramon"];
            this.ReqHP = [4000, null];
            this.ReqMP = [6000, 4000];
            this.ReqAtaque = [400, 500];
            this.ReqDefesa = [400, 400];
            this.ReqVelocidade = [200, null];
            this.ReqInteligencia = [500, 400];
            this.ReqDescuidos = [[10, 100], [0, 5]];
            this.ReqPeso = [[25, 35], [25, 35]];
            this.ReqFelicidade = [null, null];
            this.ReqDisciplina = [null, null];
            this.ReqBatalhas = [[40, 100], [0, 0]];
            this.ReqNTecnicas = [45, 40];
            this.ReqEspecial = [null, null];
            }

        if(SelectDigimonAtual.value == 20)
            {
            this.Sprite = "url(Sprites/Giromon.gif)";
            this.Nome = "Giromon";
            this.DigievolucoesPossiveis = [null];
            this.ReqHP = [null];
            this.ReqMP = [null];
            this.ReqAtaque = [null];
            this.ReqDefesa = [null];
            this.ReqVelocidade = [null];
            this.ReqInteligencia = [null];
            this.ReqDescuidos = [null];
            this.ReqPeso = [null];
            this.ReqFelicidade = [null];
            this.ReqDisciplina = [null];
            this.ReqBatalhas = [null];
            this.ReqNTecnicas = [null];
            this.ReqEspecial = [null];
            }

        if(SelectDigimonAtual.value == 21)
            {
            this.Sprite = "url(Sprites/Greymon.gif)";
            this.Nome = "Greymon";
            this.DigievolucoesPossiveis = ["MetalGreymon", "SkullGreymon"];
            this.ReqHP = [4000, 4000];
            this.ReqMP = [3000, 6000];
            this.ReqAtaque = [500, 400];
            this.ReqDefesa = [500, 400];
            this.ReqVelocidade = [300, 200];
            this.ReqInteligencia = [300, 500];
            this.ReqDescuidos = [[0, 10], [10, 100]];
            this.ReqPeso = [[60, 70], [25, 35]];
            this.ReqFelicidade = [null, null];
            this.ReqDisciplina = [[95, 100], null];
            this.ReqBatalhas = [[30, 100], [40, 100]];
            this.ReqNTecnicas = [30, 45];
            this.ReqEspecial = [null, null];
            }

        if(SelectDigimonAtual.value == 22)
            {
            this.Sprite = "url(Sprites/H-Kabuterimon.gif)";
            this.Nome = "H-Kabuterimon";
            this.DigievolucoesPossiveis = [null];
            this.ReqHP = [null];
            this.ReqMP = [null];
            this.ReqAtaque = [null];
            this.ReqDefesa = [null];
            this.ReqVelocidade = [null];
            this.ReqInteligencia = [null];
            this.ReqDescuidos = [null];
            this.ReqPeso = [null];
            this.ReqFelicidade = [null];
            this.ReqDisciplina = [null];
            this.ReqBatalhas = [null];
            this.ReqNTecnicas = [null];
            this.ReqEspecial = [null];
            }

        if(SelectDigimonAtual.value == 23)
            {
            this.Sprite = "url(Sprites/Kabuterimon.gif)";
            this.Nome = "Kabuterimon";
            this.DigievolucoesPossiveis = ["H-Kabuterimon", "MetalMamemon"];
            this.ReqHP = [7000, null];
            this.ReqMP = [null, null];
            this.ReqAtaque = [400, 500];
            this.ReqDefesa = [600, 400];
            this.ReqVelocidade = [400, 400];
            this.ReqInteligencia = [null, 400];
            this.ReqDescuidos = [[0, 5], [0, 15]];
            this.ReqPeso = [[50, 60], [5, 15]];
            this.ReqFelicidade = [null, [95, 100]];
            this.ReqDisciplina = [null, null];
            this.ReqBatalhas = [[0, 0], null];
            this.ReqNTecnicas = [40, 30];
            this.ReqEspecial = [null, null];
            }

        if(SelectDigimonAtual.value == 24)
            {
            this.Sprite = "url(Sprites/Kokatorimon.gif)";
            this.Nome = "Kokatorimon";
            this.DigievolucoesPossiveis = ["Phoenixmon", "Piximon"];
            this.ReqHP = [4000, null];
            this.ReqMP = [4000, null];
            this.ReqAtaque = [null, 300];
            this.ReqDefesa = [null, 300];
            this.ReqVelocidade = [400, 400];
            this.ReqInteligencia = [600, 400];
            this.ReqDescuidos = [[0, 3], [15, 100]];
            this.ReqPeso = [[25, 35], [0, 10]];
            this.ReqFelicidade = [null, [95, 100]];
            this.ReqDisciplina = [100, 100], null;
            this.ReqBatalhas = [[0, 0], null];
            this.ReqNTecnicas = [40, 25];
            this.ReqEspecial = [null, null];
            }

        if(SelectDigimonAtual.value == 25)
            {
            this.Sprite = "url(Sprites/Koromon.gif)";
            this.Nome = "Koromon";
            this.DigievolucoesPossiveis = ["Agumon", "Gabumon"];
            this.ReqHP = [10, null];
            this.ReqMP = [10, null];
            this.ReqAtaque = [1, null];
            this.ReqDefesa = [null, 1];
            this.ReqVelocidade = [null, 1];
            this.ReqInteligencia = [null, 1];
            this.ReqDescuidos = [[0, 100], [0, 100]];
            this.ReqPeso = [[10, 20], [10, 20]];
            this.ReqFelicidade = [null, null];
            this.ReqDisciplina = [null, null];
            this.ReqBatalhas = [null, null];
            this.ReqNTecnicas = [null, null];
            this.ReqEspecial = ['Koromon.gif', 'Koromon.gif'];
            }

        if(SelectDigimonAtual.value == 26)
            {
            this.Sprite = "url(Sprites/Kunemon.gif)";
            this.Nome = "Kunemon";
            this.DigievolucoesPossiveis = ["Bakemon", "Kabuterimon", "Kuwagamon", "Vegiemon"];
            this.ReqHP = [null, 1000, 1000, null];
            this.ReqMP = [1000, 1000, 1000, 1000];
            this.ReqAtaque = [null, 100, 100, null];
            this.ReqDefesa = [null, null, null, null];
            this.ReqVelocidade = [null, 100, 100, null];
            this.ReqInteligencia = [null, null, null, null];
            this.ReqDescuidos = [[3, 100], [0, 1], [5, 100], [5, 100]];
            this.ReqPeso = [[15, 25], [25, 35], [25, 35], [5, 15]];
            this.ReqFelicidade = [[50, 100], null, null, [50, 100]];
            this.ReqDisciplina = [null, null, null, null];
            this.ReqBatalhas = [null, null, null, null];
            this.ReqNTecnicas = [28, 35, 28, 21];
            this.ReqEspecial = [null, null, null, null];
            }

        if(SelectDigimonAtual.value == 27)
            {
            this.Sprite = "url(Sprites/Kuwagamon.gif)";
            this.Nome = "Kuwagamon";
            this.DigievolucoesPossiveis = ["H-Kabuterimon", "Piximon"];
            this.ReqHP = [7000, null];
            this.ReqMP = [null, null];
            this.ReqAtaque = [400, 300];
            this.ReqDefesa = [600, 300];
            this.ReqVelocidade = [400, 400];
            this.ReqInteligencia = [null, 400];
            this.ReqDescuidos = [[0, 5], [15, 100]];
            this.ReqPeso = [[50, 60], [0, 10]];
            this.ReqFelicidade = [null, [95, 100]];
            this.ReqDisciplina = [null, null];
            this.ReqBatalhas = [[0, 0], null];
            this.ReqNTecnicas = [40, 25];
            this.ReqEspecial = [null, null];
            }

        if(SelectDigimonAtual.value == 28)
            {
            this.Sprite = "url(Sprites/Leomon.gif)";
            this.Nome = "Leomon";
            this.DigievolucoesPossiveis = ["Andromon", "Mamemon"];
            this.ReqHP = [2000, null];
            this.ReqMP = [4000, null];
            this.ReqAtaque = [200, 400];
            this.ReqDefesa = [400, 300];
            this.ReqVelocidade = [200, 300];
            this.ReqInteligencia = [400, 400];
            this.ReqDescuidos = [[0, 5], [15, 100]];
            this.ReqPeso = [[35, 45], [0, 10]];
            this.ReqFelicidade = [null, [90, 100]];
            this.ReqDisciplina = [[95, 100], null];
            this.ReqBatalhas = [[30, 100], null];
            this.ReqNTecnicas = [30, 25];
            this.ReqEspecial = [null, null];
            }

        if(SelectDigimonAtual.value == 29)
            {
            this.Sprite = "url(Sprites/Mamemon.gif)";
            this.Nome = "Mamemon";
            this.DigievolucoesPossiveis = [null];
            this.ReqHP = [null];
            this.ReqMP = [null];
            this.ReqAtaque = [null];
            this.ReqDefesa = [null];
            this.ReqVelocidade = [null];
            this.ReqInteligencia = [null];
            this.ReqDescuidos = [null];
            this.ReqPeso = [null];
            this.ReqFelicidade = [null];
            this.ReqDisciplina = [null];
            this.ReqBatalhas = [null];
            this.ReqNTecnicas = [null];
            this.ReqEspecial = [null];
            }

        if(SelectDigimonAtual.value == 30)
            {
            this.Sprite = "url(Sprites/Megadramon.gif)";
            this.Nome = "Megadramon";
            this.DigievolucoesPossiveis = [null];
            this.ReqHP = [null];
            this.ReqMP = [null];
            this.ReqAtaque = [null];
            this.ReqDefesa = [null];
            this.ReqVelocidade = [null];
            this.ReqInteligencia = [null];
            this.ReqDescuidos = [null];
            this.ReqPeso = [null];
            this.ReqFelicidade = [null];
            this.ReqDisciplina = [null];
            this.ReqBatalhas = [null];
            this.ReqNTecnicas = [null];
            this.ReqEspecial = [null];
            }

        if(SelectDigimonAtual.value == 31)
            {
            this.Sprite = "url(Sprites/MegaSeadramon.gif)";
            this.Nome = "MegaSeadramon";
            this.DigievolucoesPossiveis = [null];
            this.ReqHP = [null];
            this.ReqMP = [null];
            this.ReqAtaque = [null];
            this.ReqDefesa = [null];
            this.ReqVelocidade = [null];
            this.ReqInteligencia = [null];
            this.ReqDescuidos = [null];
            this.ReqPeso = [null];
            this.ReqFelicidade = [null];
            this.ReqDisciplina = [null];
            this.ReqBatalhas = [null];
            this.ReqNTecnicas = [null];
            this.ReqEspecial = [null];
            }

        if(SelectDigimonAtual.value == 32)
            {
            this.Sprite = "url(Sprites/Meramon.gif)";
            this.Nome = "Meramon";
            this.DigievolucoesPossiveis = ["MetalGreymon", "Andromon"];
            this.ReqHP = [4000, 2000];
            this.ReqMP = [3000, 4000];
            this.ReqAtaque = [500, 200];
            this.ReqDefesa = [500, 400];
            this.ReqVelocidade = [300, 200];
            this.ReqInteligencia = [300, 400];
            this.ReqDescuidos = [[0, 10], [0, 5]];
            this.ReqPeso = [[60, 70], [35, 45]];
            this.ReqFelicidade = [null, null];
            this.ReqDisciplina = [[95, 100], [95, 100]];
            this.ReqBatalhas = [[30, 100], [30, 100]];
            this.ReqNTecnicas = [30, 30];
            this.ReqEspecial = [null, null];
            }

        if(SelectDigimonAtual.value == 33)
            {
            this.Sprite = "url(Sprites/MetalGreymon.gif)";
            this.Nome = "MetalGreymon";
            this.DigievolucoesPossiveis = [null];
            this.ReqHP = [null];
            this.ReqMP = [null];
            this.ReqAtaque = [null];
            this.ReqDefesa = [null];
            this.ReqVelocidade = [null];
            this.ReqInteligencia = [null];
            this.ReqDescuidos = [null];
            this.ReqPeso = [null];
            this.ReqFelicidade = [null];
            this.ReqDisciplina = [null];
            this.ReqBatalhas = [null];
            this.ReqNTecnicas = [null];
            this.ReqEspecial = [null];
            }

        if(SelectDigimonAtual.value == 34)
            {
            this.Sprite = "url(Sprites/MetalMamemon.gif)";
            this.Nome = "MetalMamemon";
            this.DigievolucoesPossiveis = [null];
            this.ReqHP = [null];
            this.ReqMP = [null];
            this.ReqAtaque = [null];
            this.ReqDefesa = [null];
            this.ReqVelocidade = [null];
            this.ReqInteligencia = [null];
            this.ReqDescuidos = [null];
            this.ReqPeso = [null];
            this.ReqFelicidade = [null];
            this.ReqDisciplina = [null];
            this.ReqBatalhas = [null];
            this.ReqNTecnicas = [null];
            this.ReqEspecial = [null];
            }

        if(SelectDigimonAtual.value == 35)
            {
            this.Sprite = "url(Sprites/Mojyamon.gif)";
            this.Nome = "Mojyamon";
            this.DigievolucoesPossiveis = ["SkullGreymon", "Mamemon"];
            this.ReqHP = [4000, null];
            this.ReqMP = [6000, null];
            this.ReqAtaque = [400, 400];
            this.ReqDefesa = [400, 300];
            this.ReqVelocidade = [200, 300];
            this.ReqInteligencia = [500, 400];
            this.ReqDescuidos = [[10, 100], [15, 100]];
            this.ReqPeso = [[25, 35], [0, 10]];
            this.ReqFelicidade = [null, [90, 100]];
            this.ReqDisciplina = [null, null];
            this.ReqBatalhas = [[40, 100], null];
            this.ReqNTecnicas = [45, 25];
            this.ReqEspecial = [null, null];
            }

        if(SelectDigimonAtual.value == 36)
            {
            this.Sprite = "url(Sprites/Monochromon.gif)";
            this.Nome = "Monochromon";
            this.DigievolucoesPossiveis = ["MetalGreymon", "MetalMamemon"];
            this.ReqHP = [4000, null];
            this.ReqMP = [3000, null];
            this.ReqAtaque = [500, 500];
            this.ReqDefesa = [500, 400];
            this.ReqVelocidade = [300, 400];
            this.ReqInteligencia = [300, 400];
            this.ReqDescuidos = [[0, 10], [0, 15]];
            this.ReqPeso = [[60, 70], [5, 15]];
            this.ReqFelicidade = [null, [95, 100]];
            this.ReqDisciplina = [[95, 100], null];
            this.ReqBatalhas = [[30, 100], null];
            this.ReqNTecnicas = [30, 30];
            this.ReqEspecial = [null, null];
            }

        if(SelectDigimonAtual.value == 37)
            {
            this.Sprite = "url(Sprites/Monzaemon.gif)";
            this.Nome = "Monzaemon";
            this.DigievolucoesPossiveis = [null];
            this.ReqHP = [null];
            this.ReqMP = [null];
            this.ReqAtaque = [null];
            this.ReqDefesa = [null];
            this.ReqVelocidade = [null];
            this.ReqInteligencia = [null];
            this.ReqDescuidos = [null];
            this.ReqPeso = [null];
            this.ReqFelicidade = [null];
            this.ReqDisciplina = [null];
            this.ReqBatalhas = [null];
            this.ReqNTecnicas = [null];
            this.ReqEspecial = [null];
            }

        if(SelectDigimonAtual.value == 38)
            {
            this.Sprite = "url(Sprites/Nanimon.gif)";
            this.Nome = "Nanimon";
            this.DigievolucoesPossiveis = ["Digitamamon"];
            this.ReqHP = [3000];
            this.ReqMP = [3000];
            this.ReqAtaque = [400];
            this.ReqDefesa = [400];
            this.ReqVelocidade = [400];
            this.ReqInteligencia = [300];
            this.ReqDescuidos = [[0, 0]];
            this.ReqPeso = [[5, 15]];
            this.ReqFelicidade = [null];
            this.ReqDisciplina = [null];
            this.ReqBatalhas = [[100, 100]];
            this.ReqNTecnicas = [49];
            this.ReqEspecial = [null];
            }

        if(SelectDigimonAtual.value == 39)
            {
            this.Sprite = "url(Sprites/Ninjamon.gif)";
            this.Nome = "Ninjamon";
            this.DigievolucoesPossiveis = ["Piximon", "MetalMamemon", "Mamemon"];
            this.ReqHP = [null];
            this.ReqMP = [null];
            this.ReqAtaque = [300, 500, 400];
            this.ReqDefesa = [300, 400, 300];
            this.ReqVelocidade = [400, 400, 300];
            this.ReqInteligencia = [400, 400, 400];
            this.ReqDescuidos = [[15, 100], [0, 15], [15, 100]];
            this.ReqPeso = [[0, 10], [5, 15], [0, 10]];
            this.ReqFelicidade = [[95, 100], [95, 100], [90, 100]];
            this.ReqDisciplina = [null];
            this.ReqBatalhas = [null];
            this.ReqNTecnicas = [25, 30, 25];
            this.ReqEspecial = [null];
            }

        if(SelectDigimonAtual.value == 40)
            {
            this.Sprite = "url(Sprites/Numemon.gif)";
            this.Nome = "Numemon";
            this.DigievolucoesPossiveis = ["Monzaemon"];
            this.ReqHP = [3000];
            this.ReqMP = [3000];
            this.ReqAtaque = [300];
            this.ReqDefesa = [300];
            this.ReqVelocidade = [300];
            this.ReqInteligencia = [300];
            this.ReqDescuidos = [[0, 0]];
            this.ReqPeso = [[35, 45]];
            this.ReqFelicidade = [null];
            this.ReqDisciplina = [null];
            this.ReqBatalhas = [[0, 50]];
            this.ReqNTecnicas = [49];
            this.ReqEspecial = [null];
            }

        if(SelectDigimonAtual.value == 41)
            {
            this.Sprite = "url(Sprites/Ogremon.gif)";
            this.Nome = "Ogremon";
            this.DigievolucoesPossiveis = ["Andromon", "Giromon"];
            this.ReqHP = [2000, null];
            this.ReqMP = [4000, null];
            this.ReqAtaque = [200, 400];
            this.ReqDefesa = [400, null];
            this.ReqVelocidade = [200, 300];
            this.ReqInteligencia = [400, 400];
            this.ReqDescuidos = [[0, 5], [15, 100]];
            this.ReqPeso = [[35, 45], [0, 10]];
            this.ReqFelicidade = [null, [95, 100]];
            this.ReqDisciplina = [[95, 100], null];
            this.ReqBatalhas = [[30, 100], [100, 100]];
            this.ReqNTecnicas = [30, 35];
            this.ReqEspecial = [null, null];
            }

        if(SelectDigimonAtual.value == 42)
            {
            this.Sprite = "url(Sprites/Palmon.gif)";
            this.Nome = "Palmon";
            this.DigievolucoesPossiveis = ["Kuwagamon", "Vegiemon", "Ninjamon", "Whamon", "Coelamon"];
            this.ReqHP = [1000, null, null, 1000, null];
            this.ReqMP = [1000, 1000, 1000, null, null];
            this.ReqAtaque = [100, null, 100, null, null];
            this.ReqDefesa = [null, null, null, null, 100];
            this.ReqVelocidade = [100, null, 100, null, null];
            this.ReqInteligencia = [null, null, null, 100, null];
            this.ReqDescuidos = [[5, 100], [5, 100], [0, 1], [0, 5], [3, 100]];
            this.ReqPeso = [[25, 35], [5, 15], [5, 15], [35, 45], [25, 35]];
            this.ReqFelicidade = [null, [50, 100], null, null, null];
            this.ReqDisciplina = [null, null, null, [60, 100], null];
            this.ReqBatalhas = [null, null, [15, 100], null, [0, 5]];
            this.ReqNTecnicas = [28, 21, 35, 28, 35];
            this.ReqEspecial = ['Kunemon.gif', null, null, null, null];
            }

        if(SelectDigimonAtual.value == 43)
            {
            this.Sprite = "url(Sprites/Patamon.gif)";
            this.Nome = "Patamon";
            this.DigievolucoesPossiveis = ["Drimogemon", "Tyrannomon", "Ogremon", "Leomon", "Angemon", "Unimon"];
            this.ReqHP = [null, 1000, 1000, null, null, 1000];
            this.ReqMP = [null, null, null, null, 1000, null];
            this.ReqAtaque = [100, null, 100, 100, null, null];
            this.ReqDefesa = [null, 100, null, null, null, null];
            this.ReqVelocidade = [null, null, null, 100, null, 100];
            this.ReqInteligencia = [null, null, null, 100, 100, null];
            this.ReqDescuidos = [[3, 100], [0, 5], [5, 100], [0, 1], [0, 0], [0, 3]];
            this.ReqPeso = [[35, 45], [25, 35], [25, 35], [15, 25], [15, 25], [25, 35]];
            this.ReqFelicidade = [[50, 100], null, null, null, null, null];
            this.ReqDisciplina = [null, null, null, null, null, null];
            this.ReqBatalhas = [null, [0, 5], [15, 100], [10, 100], null, [10, 100]];
            this.ReqNTecnicas = [28, 28, 35, 35, 35, 35];
            this.ReqEspecial = [null, null, null, null, 'Patamon.gif', null];
            }

        if(SelectDigimonAtual.value == 44)
            {
            this.Sprite = "url(Sprites/Penguinmon.gif)";
            this.Nome = "Penguinmon";
            this.DigievolucoesPossiveis = ["Whamon", "Shellmon", "Garurumon", "Frigimon", "Mojyamon"];
            this.ReqHP = [1000, 1000, null, null, 1000];
            this.ReqMP = [null, null, 1000, 1000, null];
            this.ReqAtaque = [null, null, null, null, 43, null];
            this.ReqDefesa = [null, 100, null, null, null];
            this.ReqVelocidade = [null, null, 100, null, null];
            this.ReqInteligencia = [100, null, null, 100, null];
            this.ReqDescuidos = [[0, 5], [5, 100], [0, 1], [0, 5], [5, 100]];
            this.ReqPeso = [[35, 45], [35, 45], [25, 35], [25, 35], [15, 25]];
            this.ReqFelicidade = [null, null, null, [50, 100], null];
            this.ReqDisciplina = [[60, 100], null, [90, 100], null, null];
            this.ReqBatalhas = [null, null, null, null, [0, 5]];
            this.ReqNTecnicas = [28, 35, 28, 28, 28];
            this.ReqEspecial = [null, 'Betamon.gif', null, null, null];
            }

        if(SelectDigimonAtual.value == 45)
            {
            this.Sprite = "url(Sprites/Phoenixmon.gif)";
            this.Nome = "Phoenixmon";
            this.DigievolucoesPossiveis = [null];
            this.ReqHP = [null];
            this.ReqMP = [null];
            this.ReqAtaque = [null];
            this.ReqDefesa = [null];
            this.ReqVelocidade = [null];
            this.ReqInteligencia = [null];
            this.ReqDescuidos = [null];
            this.ReqPeso = [null];
            this.ReqFelicidade = [null];
            this.ReqDisciplina = [null];
            this.ReqBatalhas = [null];
            this.ReqNTecnicas = [null];
            this.ReqEspecial = [null];
            }

        if(SelectDigimonAtual.value == 46)
            {
            this.Sprite = "url(Sprites/Piximon.gif)";
            this.Nome = "Piximon";
            this.DigievolucoesPossiveis = [null];
            this.ReqHP = [null];
            this.ReqMP = [null];
            this.ReqAtaque = [null];
            this.ReqDefesa = [null];
            this.ReqVelocidade = [null];
            this.ReqInteligencia = [null];
            this.ReqDescuidos = [null];
            this.ReqPeso = [null];
            this.ReqFelicidade = [null];
            this.ReqDisciplina = [null];
            this.ReqBatalhas = [null];
            this.ReqNTecnicas = [null];
            this.ReqEspecial = [null];
            }

        if(SelectDigimonAtual.value == 47)
            {
            this.Sprite = "url(Sprites/Poyomon.gif)";
            this.Nome = "Poyomon";
            this.DigievolucoesPossiveis = ["Tokomon"];
            this.ReqHP = [null];
            this.ReqMP = [null];
            this.ReqAtaque = [null];
            this.ReqDefesa = [null];
            this.ReqVelocidade = [null];
            this.ReqInteligencia = [null];
            this.ReqDescuidos = [null];
            this.ReqPeso = [null];
            this.ReqFelicidade = [null];
            this.ReqDisciplina = [null];
            this.ReqBatalhas = [null];
            this.ReqNTecnicas = [null];
            this.ReqEspecial = [null];
            }

        if(SelectDigimonAtual.value == 48)
            {
            this.Sprite = "url(Sprites/Punimon.gif)";
            this.Nome = "Punimon";
            this.DigievolucoesPossiveis = ["Tsunomon"];
            this.ReqHP = [null];
            this.ReqMP = [null];
            this.ReqAtaque = [null];
            this.ReqDefesa = [null];
            this.ReqVelocidade = [null];
            this.ReqInteligencia = [null];
            this.ReqDescuidos = [null];
            this.ReqPeso = [null];
            this.ReqFelicidade = [null];
            this.ReqDisciplina = [null];
            this.ReqBatalhas = [null];
            this.ReqNTecnicas = [null];
            this.ReqEspecial = [null];
            }

        if(SelectDigimonAtual.value == 49)
            {
            this.Sprite = "url(Sprites/Seadramon.gif)";
            this.Nome = "Seadramon";
            this.DigievolucoesPossiveis = ["Megadramon", "MegaSeadramon"];
            this.ReqHP = [3000, null];
            this.ReqMP = [5000, 4000];
            this.ReqAtaque = [500, 500];
            this.ReqDefesa = [300, 400];
            this.ReqVelocidade = [400, null];
            this.ReqInteligencia = [400, 400];
            this.ReqDescuidos = [[0, 10], [0, 5]];
            this.ReqPeso = [[50, 60], [25, 35]];
            this.ReqFelicidade = [null, null];
            this.ReqDisciplina = [null, null];
            this.ReqBatalhas = [[30, 100], [0, 0]];
            this.ReqNTecnicas = [30, 40];
            this.ReqEspecial = [null, null];
            }

        if(SelectDigimonAtual.value == 50)
            {
            this.Sprite = "url(Sprites/Shellmon.gif)";
            this.Nome = "Shellmon";
            this.DigievolucoesPossiveis = ["H-Kabuterimon", "MegaSeadramon"];
            this.ReqHP = [7000, null];
            this.ReqMP = [null, 4000];
            this.ReqAtaque = [400, 500];
            this.ReqDefesa = [600, 400];
            this.ReqVelocidade = [400, null];
            this.ReqInteligencia = [null, 400];
            this.ReqDescuidos = [[0, 5], [0, 5]];
            this.ReqPeso = [[50, 60], [25, 35]];
            this.ReqFelicidade = [null, null];
            this.ReqDisciplina = [null, null];
            this.ReqBatalhas = [[0, 0], [0, 0]];
            this.ReqNTecnicas = [40, 40];
            this.ReqEspecial = [null, null];
            }

        if(SelectDigimonAtual.value == 51)
            {
            this.Sprite = "url(Sprites/SkullGreymon.gif)";
            this.Nome = "SkullGreymon";
            this.DigievolucoesPossiveis = [null];
            this.ReqHP = [null];
            this.ReqMP = [null];
            this.ReqAtaque = [null];
            this.ReqDefesa = [null];
            this.ReqVelocidade = [null];
            this.ReqInteligencia = [null];
            this.ReqDescuidos = [null];
            this.ReqPeso = [null];
            this.ReqFelicidade = [null];
            this.ReqDisciplina = [null];
            this.ReqBatalhas = [null];
            this.ReqNTecnicas = [null];
            this.ReqEspecial = [null];
            }

        if(SelectDigimonAtual.value == 52)
            {
            this.Sprite = "url(Sprites/Sukamon.gif)";
            this.Nome = "Sukamon";
            this.DigievolucoesPossiveis = ["Etemon"];
            this.ReqHP = [2000];
            this.ReqMP = [3000];
            this.ReqAtaque = [400];
            this.ReqDefesa = [200];
            this.ReqVelocidade = [400];
            this.ReqInteligencia = [300];
            this.ReqDescuidos = [0, 0];
            this.ReqPeso = [[10, 20]];
            this.ReqFelicidade = [null];
            this.ReqDisciplina = [null];
            this.ReqBatalhas = [[50, 100]];
            this.ReqNTecnicas = [49];
            this.ReqEspecial = [null];
            }

        if(SelectDigimonAtual.value == 53)
            {
            this.Sprite = "url(Sprites/Tanemon.gif)";
            this.Nome = "Tanemon";
            this.DigievolucoesPossiveis = ["Palmon", "Betamon"];
            this.ReqHP = [null, 10];
            this.ReqMP = [10, 10];
            this.ReqAtaque = [null, null];
            this.ReqDefesa = [null, 1];
            this.ReqVelocidade = [1, null];
            this.ReqInteligencia = [1, null];
            this.ReqDescuidos = [[0, 100], [0, 100]];
            this.ReqPeso = [[10, 20], [10, 20]];
            this.ReqFelicidade = [null, null];
            this.ReqDisciplina = [null, null];
            this.ReqBatalhas = [null, null];
            this.ReqNTecnicas = [null, null];
            this.ReqEspecial = ['Tanemon.gif', 'Tanemon.gif'];
            }

        if(SelectDigimonAtual.value == 54)
            {
            this.Sprite = "url(Sprites/Tokomon.gif)";
            this.Nome = "Tokomon";
            this.DigievolucoesPossiveis = ["Patamon", "Biyomon"];
            this.ReqHP = [10, null];
            this.ReqMP = [null, 10];
            this.ReqAtaque = [1, null];
            this.ReqDefesa = [null, 1];
            this.ReqVelocidade = [null, 1];
            this.ReqInteligencia = [1, null];
            this.ReqDescuidos = [0, 100], [0, 100];
            this.ReqPeso = [[10, 20], [10, 20]];
            this.ReqFelicidade = [null, null];
            this.ReqDisciplina = [null, null];
            this.ReqBatalhas = [null, null];
            this.ReqNTecnicas = [null, null];
            this.ReqEspecial = ['Tokomon.gif', 'Tokomon.gif'];
            }

        if(SelectDigimonAtual.value == 55)
            {
            this.Sprite = "url(Sprites/Tsunomon.gif)";
            this.Nome = "Tsunomon";
            this.DigievolucoesPossiveis = ["Elecmon", "Penguinmon"];
            this.ReqHP = [10, null];
            this.ReqMP = [null, 10];
            this.ReqAtaque = [1, null];
            this.ReqDefesa = [null, 1];
            this.ReqVelocidade = [1, null];
            this.ReqInteligencia = [null, 1];
            this.ReqDescuidos = [[0, 100], [0, 100]];
            this.ReqPeso = [[10, 20], [10, 20]];
            this.ReqFelicidade = [null, null];
            this.ReqDisciplina = [null, null];
            this.ReqBatalhas = [null, null];
            this.ReqNTecnicas = [null, null];
            this.ReqEspecial = ['Tsunomon.gif', 'Tsunomon.gif'];
            }

        if(SelectDigimonAtual.value == 56)
            {
            this.Sprite = "url(Sprites/Tyrannomon.gif)";
            this.Nome = "Tyrannomon";
            this.DigievolucoesPossiveis = ["MetalGreymon", "Megadramon"];
            this.ReqHP = [4000, 3000];
            this.ReqMP = [3000, 5000];
            this.ReqAtaque = [500, 500];
            this.ReqDefesa = [500, 300];
            this.ReqVelocidade = [300, 400];
            this.ReqInteligencia = [300, 400];
            this.ReqDescuidos = [[0, 10], [0, 10]];
            this.ReqPeso = [[60, 70], [50, 60]];
            this.ReqFelicidade = [null, null];
            this.ReqDisciplina = [[95, 100], null];
            this.ReqBatalhas = [[30, 100], [30, 100]];
            this.ReqNTecnicas = [30, 30];
            this.ReqEspecial = [null, null];
            }

        if(SelectDigimonAtual.value == 57)
            {
            this.Sprite = "url(Sprites/Unimon.gif)";
            this.Nome = "Unimon";
            this.DigievolucoesPossiveis = ["Giromon", "Phoenixmon"];
            this.ReqHP = [null, 4000];
            this.ReqMP = [null, 4000];
            this.ReqAtaque = [400, null];
            this.ReqDefesa = [null, null];
            this.ReqVelocidade = [300, 400];
            this.ReqInteligencia = [400, 600];
            this.ReqDescuidos = [[15, 100], [0, 3]];
            this.ReqPeso = [[0, 10], [25, 35]];
            this.ReqFelicidade = [[95, 100], null];
            this.ReqDisciplina = [null, [100, 100]];
            this.ReqBatalhas = [[100, 100], [0, 0]];
            this.ReqNTecnicas = [35, 40];
            this.ReqEspecial = [null, null];
            }

        if(SelectDigimonAtual.value == 58)
            {
            this.Sprite = "url(Sprites/Vademon.gif)";
            this.Nome = "Vademon";
            this.DigievolucoesPossiveis = [null];
            this.ReqHP = [null];
            this.ReqMP = [null];
            this.ReqAtaque = [null];
            this.ReqDefesa = [null];
            this.ReqVelocidade = [null];
            this.ReqInteligencia = [null];
            this.ReqDescuidos = [null];
            this.ReqPeso = [null];
            this.ReqFelicidade = [null];
            this.ReqDisciplina = [null];
            this.ReqBatalhas = [null];
            this.ReqNTecnicas = [null];
            this.ReqEspecial = [null];
            }

        if(SelectDigimonAtual.value == 59)
            {
            this.Sprite = "url(Sprites/Vegiemon.png)";
            this.Nome = "Vegiemon";
            this.DigievolucoesPossiveis = ["Piximon"];
            this.ReqHP = [null];
            this.ReqMP = [null];
            this.ReqAtaque = [300];
            this.ReqDefesa = [300];
            this.ReqVelocidade = [400];
            this.ReqInteligencia = [400];
            this.ReqDescuidos = [[15, 100]];
            this.ReqPeso = [[0, 10]];
            this.ReqFelicidade = [[95, 100]];
            this.ReqDisciplina = [null];
            this.ReqBatalhas = [null];
            this.ReqNTecnicas = [25];
            this.ReqEspecial = [null];
            }

        if(SelectDigimonAtual.value == 60)
            {
            this.Sprite = "url(Sprites/Whamon.gif)";
            this.Nome = "Whamon";
            this.DigievolucoesPossiveis = ["MegaSeadramon", "Mamemon"];
            this.ReqHP = [null, null];
            this.ReqMP = [4000, null];
            this.ReqAtaque = [500, 400];
            this.ReqDefesa = [400, 300];
            this.ReqVelocidade = [null, 300];
            this.ReqInteligencia = [400, 400];
            this.ReqDescuidos = [[0, 5], [15, 100]];
            this.ReqPeso = [[25, 35], [0, 10]];
            this.ReqFelicidade = [null, [90, 100]];
            this.ReqDisciplina = [null, null];
            this.ReqBatalhas = [[0, 0], null];
            this.ReqNTecnicas = [40, 25];
            this.ReqEspecial = [null, null];
            }

        if(SelectDigimonAtual.value == 61)
            {
            this.Sprite = "url(Sprites/Yuramon.gif)";
            this.Nome = "Yuramon";
            this.DigievolucoesPossiveis = ["Tanemon"];
            this.ReqHP = [null];
            this.ReqMP = [null];
            this.ReqAtaque = [null];
            this.ReqDefesa = [null];
            this.ReqVelocidade = [null];
            this.ReqInteligencia = [null];
            this.ReqDescuidos = [null];
            this.ReqPeso = [null];
            this.ReqFelicidade = [null];
            this.ReqDisciplina = [null];
            this.ReqBatalhas = [null];
            this.ReqNTecnicas = [null];
            this.ReqEspecial = [null];
            }
        
            //--------------------------------------------------------------------------------
    
        SelectDigimonAtual.style.backgroundImage = this.Sprite; //"url(Sprites/Airdramon.gif)"

        var retorno = "";

        if(this.DigievolucoesPossiveis.length != 0)
            {
            for(let d = 0; d < this.DigievolucoesPossiveis.length; d++)
                {
                var RequisitoHP;
                if(this.ReqHP[d] != null)
                    {RequisitoHP = "<a data-toggle='tooltip' title="+this.ReqHP[d]+"><img src='Sprites/hp.png' width='32' ></a>"}else RequisitoHP = "";
                var RequisitoMP;
                if(this.ReqMP[d] != null)
                    {RequisitoMP = "<img src='Sprites/mp.png' width='32' title="+this.ReqMP[d]+">"}else RequisitoMP = "";
                var RequisitoAtaque;
                if(this.ReqAtaque[d] != null)
                    {RequisitoAtaque = "<img src='Sprites/offense.png' width='32' title="+this.ReqAtaque[d]+">"}else RequisitoAtaque = "";
                var RequisitoDefesa;
                if(this.ReqDefesa[d] != null)
                    {RequisitoDefesa = "<img src='Sprites/defense.png' width='32' title="+this.ReqDefesa[d]+">"}else RequisitoDefesa = "";
                var RequisitoVelocidade;
                if(this.ReqVelocidade[d] != null)
                    {RequisitoVelocidade = "<img src='Sprites/speed.png' width='32' title="+this.ReqVelocidade[d]+">"}else RequisitoVelocidade = "";
                var RequisitoInteligencia;
                if(this.ReqInteligencia[d] != null)
                    {RequisitoInteligencia = "<img src='Sprites/brains.png' width='32' title="+this.ReqInteligencia[d]+">"}else RequisitoInteligencia = "";
                
                if(this.ReqDescuidos[d] != null)
                    {
                    if(this.ReqDescuidos[d][0] == 0)
                        {
                        RequisitoDescuidos = "<img src='Sprites/care.png' width='32' title='Menor que "+this.ReqDescuidos[d][1]+"'>"
                        }else RequisitoDescuidos = "<img src='Sprites/care.png' width='32' title='Maior que "+this.ReqDescuidos[d][0]+"'>";
                    }else RequisitoDescuidos = "";
                    
                if(this.ReqPeso[d] != null)
                    {
                    RequisitoPeso = "<img src='Sprites/weight.png' width='32' title='Peso entre "+this.ReqPeso[d][0]+" e "+this.ReqPeso[d][1]+"'>"
                    }else RequisitoPeso = "";

                if(this.ReqFelicidade[d])
                    {
                    if(this.ReqFelicidade[d][0] == 0)
                        {
                        RequisitoFelicidade = "<img src='Sprites/happiness.png' width='32' title='Menor que "+this.ReqFelicidade[d][1]+"'>"
                        }else RequisitoFelicidade = "<img src='Sprites/happiness.png' width='32' title='Maior que "+this.ReqFelicidade[d][0]+"'>"
                    }else RequisitoFelicidade = "";

                if(this.ReqDisciplina[d])
                    {
                    if(this.ReqDisciplina[d][0] == 0)
                        {
                        RequisitoDisciplina = "<img src='Sprites/discipline.png' width='32' title='Menor que "+this.ReqDisciplina[d][1]+"'>"
                        }else RequisitoDisciplina = "<img src='Sprites/discipline.png' width='32' title='Maior que "+this.ReqDisciplina[d][0]+"'>"
                    }else RequisitoDisciplina = "";

                if(this.ReqBatalhas[d])
                    {
                    if(this.ReqBatalhas[d][0] == 0)
                        {
                        RequisitoBatalhas = "<img src='Sprites/battle.png' width='32' title='Menor que "+this.ReqBatalhas[d][1]+"'>"
                        }else RequisitoBatalhas = "<img src='Sprites/battle.png' width='32' title='Maior que "+this.ReqBatalhas[d][0]+"'>"
                    }else RequisitoBatalhas = "";
                
                if(this.ReqNTecnicas[d])
                    {RequisitoTecnicas = "<img src='Sprites/techniques.png' width='32' title='Mais que "+this.ReqNTecnicas[d]+" tecnicas aprendidas'>"}else RequisitoTecnicas = "";
                
                if(this.ReqEspecial[d])
                    {RequisitoEspcial = "<img src='Sprites/"+this.ReqEspecial[d]+"' width='32' title='Ter um para digievoluir'>"}
                    else RequisitoEspcial = "";
                    

                var retornoC1 = "<tr><th><img src='Sprites/"+this.DigievolucoesPossiveis[d]+".gif' width='24'" + this.DigievolucoesPossiveis[d]+ "></th><td> &nbsp;" + this.DigievolucoesPossiveis[d] +"</td>";
                var retornoC2 = "<td class='centro'>" + RequisitoHP + RequisitoMP + RequisitoAtaque + RequisitoDefesa + RequisitoVelocidade + RequisitoInteligencia + "</td>";
                var retornoC3 = "<td class='centro'>" + RequisitoDescuidos + RequisitoPeso +"</td>";
                var retornoC4 = "<td class='centro'>" + RequisitoFelicidade + RequisitoDisciplina + RequisitoBatalhas + RequisitoTecnicas + RequisitoEspcial +"</td></tr>";
                retorno += retornoC1 + retornoC2 + retornoC3 + retornoC4;
                }
            }else retorno = "";

        DivDigimonRequisitos.innerHTML = retorno;
        }
    }

