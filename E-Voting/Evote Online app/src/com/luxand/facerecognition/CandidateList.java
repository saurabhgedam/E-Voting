package com.luxand.facerecognition;

import android.app.Activity;
import android.app.AlertDialog;
import android.content.DialogInterface;
import android.content.Intent;
import android.os.AsyncTask;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.ListView;
import android.widget.TextView;
import android.widget.Toast;

import org.apache.http.HttpEntity;
import org.apache.http.HttpResponse;
import org.apache.http.NameValuePair;
import org.apache.http.client.HttpClient;
import org.apache.http.client.entity.UrlEncodedFormEntity;
import org.apache.http.client.methods.HttpPost;
import org.apache.http.impl.client.DefaultHttpClient;
import org.apache.http.message.BasicNameValuePair;
import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import com.luxand.facerecognition.R;

import java.io.BufferedReader;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.util.ArrayList;
import java.util.List;

/**
 * Candidate list.
 */
public class CandidateList extends Activity {

    private ListView list;
    private TextView electionName;
    private String election_id, user_id, election_name, candidate_name;
    private String for_confirm = "confirmation";
  
    public ArrayList<String> candidate = new ArrayList<String>();
    private ArrayAdapter<String> adapter;

    @Override
    public void onCreate(Bundle savedInstanceState){
        super.onCreate(savedInstanceState);
        setContentView(R.layout.candidate_list);
        election_id  = getIntent().getStringExtra("election_id");
        user_id  = getIntent().getStringExtra("user_id");
        election_name  = getIntent().getStringExtra("election_name");
        System.out.println("Candidate for "+election_id);
        list = (ListView)findViewById(R.id.listView);
        electionName = (TextView)findViewById(R.id.textView1);
        electionName.setText("Candidate List for "+election_name);

        new candidate_list().execute(election_id);


        list.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            @Override
            public void onItemClick(AdapterView<?> parent, View view, int position, long id) {

                candidate_name = list.getItemAtPosition(position).toString();
                AlertDialog.Builder confirm = new AlertDialog.Builder(CandidateList.this);
                confirm.setTitle("Confirm Your Vote");
                confirm.setMessage("Do you want to Vote for "+candidate_name+"?");

                confirm.setPositiveButton("Yes",
                        new DialogInterface.OnClickListener() {

                            public void onClick(DialogInterface dialog, int which) {
                            	Intent intent3 = new Intent(CandidateList.this,MainActivity.class);
                            	intent3.putExtra("user_id", user_id);
                            	intent3.putExtra("election_id", election_id);
                            	intent3.putExtra("candidate_name", candidate_name);
                            	intent3.putExtra("confirmation", for_confirm);
                            	startActivity(intent3);
                                //new is_voted().execute(user_id, election_id, candidate_name);
                                dialog.dismiss();
                                finish();
                            }
                        });
                confirm.setNegativeButton("No",
                        new DialogInterface.OnClickListener() {

                            public void onClick(DialogInterface dialog, int which) {

                                dialog.dismiss();
                            }
                        });
                confirm.show();

            }
        });

    }

    @Override
    public void onBackPressed()
    {
        Intent intent2 = new Intent(getApplicationContext(), Election_List.class);
        intent2.putExtra("user_id", user_id);
        startActivity(intent2);
        finish();
    }
    
    public class candidate_list extends AsyncTask<String,String,String> {

        String function = "candidate_list";
        InputStream is=null;
        String str;

        protected void onPreExecute()
        {

        }

        protected String doInBackground(String ... param)
        {
            HttpClient httpClient =new DefaultHttpClient();
            HttpPost httppost = new HttpPost(Constants.URL+function);

            try
            {
                System.out.println("Parameter election id :"+param[0]);
                List<NameValuePair> namevaluepair = new ArrayList<NameValuePair>();
                namevaluepair.add(new BasicNameValuePair("election_id",param[0]));
                httppost.setEntity(new UrlEncodedFormEntity(namevaluepair));

                HttpResponse response =httpClient.execute(httppost);
                HttpEntity entity = response.getEntity();
                //	String str = EntityUtils.toString(entity);

                // read content
                is = entity.getContent();

            } catch (Exception e) {

                Log.e("log_tag", "Error in http connection " + e.toString());
            }
            try {
                BufferedReader br = new BufferedReader(
                        new InputStreamReader(is));
                StringBuilder sb = new StringBuilder();
                String line = "";
                while ((line = br.readLine()) != null) {
                    sb.append(line + "\n");
                }
                is.close();
                str = sb.toString();
                System.out.println("Result do in background"+str);


            }
            catch (Exception e) {

                Log.e("log_tag", "Error converting result " + e.toString());
            }
            return str;



        }

        @Override
        protected void onPostExecute(String result) {
            try {

                JSONObject object = new JSONObject(result);
                String success = object.getString("success");
                if(success.equals("true")){
                    JSONArray array1 = object.getJSONArray("candidate_list");
                    System.out.println("JSONArray is "+array1);
                    for (int i=0; i<array1.length();i++){
                        JSONObject object2 = array1.getJSONObject(i);
                        String name = object2.getString("name");
                        System.out.println("Candidate Name is "+name);
                        candidate.add(name);
                    }
                    System.out.println("list is "+candidate);
                    adapter  = new ArrayAdapter<String>(CandidateList.this, android.R.layout.simple_list_item_1, candidate);
                    list.setAdapter(adapter);


                }


            } catch (JSONException e) {

                e.printStackTrace();
            }

        }
    }
}
