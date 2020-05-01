package principal;

import bean.AlunoBean;
import bean.CardapioBean;
import bean.CarroBean;
import bean.GameBean;
import java.rmi.registry.LocateRegistry;
import bean.ProdutoBean;
import dao.ConexaoDB;
import java.rmi.Naming;
import java.rmi.RemoteException;
import java.sql.Connection;
import static principal.Consts.IP_LOCAL;
import static principal.Consts.PORTA_LOCAL;

public class IniciaServidor {

    public static void main(String[] args) {

        try {
            System.out.println("Iniciando Servidor...");

            Connection conn = null;

            try {
                conn = ConexaoDB.retornaConexao();
                if (conn != null) {
                    System.out.println("Conectado ao bando de dados.");
                } else {
                    System.out.println("Erro de conexão ao banco de dados.");
                }
            } catch (Exception edb) {
                System.out.println("Erro no banco de dados: " + edb.toString());
            }

            LocateRegistry.createRegistry(1099);

            AlunoBean objetoAluno = new AlunoBean();
            Naming.rebind("rmi://" + IP_LOCAL + ":" + PORTA_LOCAL + "/Aluno", objetoAluno);

            CardapioBean objetoCardapio = new CardapioBean();
            Naming.rebind("rmi://" + IP_LOCAL + ":" + PORTA_LOCAL + "/Cardapio", objetoCardapio);

            CarroBean objetoCarro = new CarroBean();
            Naming.rebind("rmi://" + IP_LOCAL + ":" + PORTA_LOCAL + "/Carro", objetoCarro);

            GameBean objetoGame = new GameBean();
            Naming.rebind("rmi://" + IP_LOCAL + ":" + PORTA_LOCAL + "/Game", objetoGame);

            ProdutoBean objetoProduto = new ProdutoBean();
            Naming.rebind("rmi://" + IP_LOCAL + ":" + PORTA_LOCAL + "/Produto", objetoProduto);

        } catch (RemoteException re) {
            System.out.println("Erro remoto: " + re.toString());
        } catch (Exception e) {
            System.out.println("Erro local: " + e.toString());
        }

    }

}
