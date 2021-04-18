package dao;

import bean.CarroBean;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.util.ArrayList;

public class CarroDAO {

    public static void insert(CarroBean carro) {
        String sql = "INSERT INTO carro(modelo, ano, nota) VALUES (?, ?, ?)";

        try {
            Connection conexao = ConexaoDB.retornaConexao();
            PreparedStatement stmt = conexao.prepareStatement(sql);

            stmt.setString(1, carro.getModelo());
            stmt.setInt(2, carro.getAno());
            stmt.setDouble(3, carro.getNota());

            stmt.execute();

        } catch (Exception e) {
            System.out.println("Erro na função INSERT: " + e.toString());
        }
    }

    public static ArrayList<CarroBean> select() {
        ArrayList<CarroBean> carros = new ArrayList<>();

        String sql = "SELECT * FROM carro";

        try {
            Connection conexao = ConexaoDB.retornaConexao();
            PreparedStatement stmt = conexao.prepareStatement(sql);

            ResultSet result = stmt.executeQuery();

            while (result.next()) {
                CarroBean temporario = new CarroBean();
                
                temporario.setId(result.getInt("id"));
                temporario.setModelo(result.getString("modelo"));
                temporario.setAno(result.getInt("ano"));
                temporario.setNota(result.getDouble("nota"));
                carros.add(temporario);
            }

            return carros;

        } catch (Exception e) {
            System.err.println("Erro na função SELECT: " + e.toString());
        }
        return null;
    }

    public void update() {
    }

    public static void delete(int id) {
        String sql = "DELETE FROM carro WHERE id = ?";

        try {
            Connection conexao = ConexaoDB.retornaConexao();
            PreparedStatement stmt = conexao.prepareStatement(sql);
            stmt.setInt(1, id);
            stmt.execute();
        } catch (Exception e) {
            System.err.println("Erro na função DELETE: " + e.toString());
        }

    }

}
